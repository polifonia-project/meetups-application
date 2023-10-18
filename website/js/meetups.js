function convertRDFDateToUKDate(input) {
    output = input.substring(8,10) + '/' + input.substring(5,7) + '/' + input.substring(0,4);
    return output;
}

function formatDateString(beginDate, endDate, time_evidence) {
    //if (beginDate != endDate) {
    //    return (beginDate + ' - ' + endDate);
    //}
    //return beginDate;
    var returnString = '';
    var helperString = '';
    if (time_evidence == null) {
        returnString = 'unknown';
    }
    else {
        returnString = time_evidence;
    }

    if (beginDate != null) {
        if (beginDate == endDate) {
            helperString = convertRDFDateToUKDate(beginDate);
        }
        else {
            helperString = convertRDFDateToUKDate(beginDate) + ' -> ' + convertRDFDateToUKDate(endDate);
        }
    }

    if (helperString) {
        returnString += ' <a href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="' + helperString + '">';
        returnString += '<i class="fas fa-info-circle"></i></a>'
    }

    return returnString;
}