<?php
/**
 * Shared helpers for reading QLever SPARQL JSON results.
 *
 * QLever leaves unbound variables out of a result binding altogether, where the
 * old Blazegraph endpoint returned an empty string. Reading them blindly yields
 * array("") for every absent value -- which is how meetups with no place ended
 * up plotted at 0,0 -- plus one PHP notice per field per row.
 */

/** Read a GROUP_CONCAT column as a list; empty array when unbound. */
function bindingList($binding, $name) {
    if (!isset($binding->$name->value) || $binding->$name->value === '') {
        return array();
    }
    return explode(",", $binding->$name->value);
}

/** First value of a GROUP_CONCAT column, or null when unbound. */
function bindingFirst($binding, $name) {
    $list = bindingList($binding, $name);
    return count($list) ? $list[0] : null;
}

/** Plain (non-aggregated) column, or null when unbound. */
function bindingValue($binding, $name) {
    return isset($binding->$name->value) ? $binding->$name->value : null;
}

/**
 * Percent-encode an IRI so it is safe inside a SPARQL <...> reference.
 *
 * Subject and graph IRIs arrive via $_GET, which URL-decodes them, but the
 * graph names themselves are percent-encoded (DBpedia writes double quotes as
 * %22, e.g. .../%22Weird_Al%22_Yankovic). Passing the decoded form back
 * produced an illegal IRI and QLever rejected the whole query with
 * "extraneous input '<'". Re-encode exactly the characters the SPARQL IRIREF
 * production forbids -- <>"{}|^`\ and anything at or below U+0020 -- which
 * both restores %22 and closes the injection route through <'.$biography.'>.
 */
function sparqlIri($iri) {
    $out = '';
    $len = strlen($iri);
    for ($i = 0; $i < $len; $i++) {
        $ch = $iri[$i];
        if (ord($ch) <= 0x20 || strpos('<>"{}|^`\\', $ch) !== false) {
            $out .= sprintf('%%%02X', ord($ch));
        } else {
            $out .= $ch;
        }
    }
    return $out;
}
