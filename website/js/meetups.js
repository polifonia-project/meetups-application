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

// Take an array of numbers and calculate the frequencies of each number
function countFrequencies(inputArray) {
    // Create an empty object to store the frequencies
    let frequencies = {};
    // Loop through the array of numbers
    for (let number of inputArray) {
        // If the number is already a key in the object, increment its value by one
        if (frequencies[number]) {
            frequencies[number]++;
        }
        // Otherwise, create a new key with the number and set its value to one
        else {
            frequencies[number] = 1;
        }
    }
    // Return the object with the frequencies
    return frequencies;
}

function generateDateFrequencyData(inputData) {
    // create array of years
    var years = [];
    $.each(inputData, function(i, field){
        //console.log(field.beginDate);
        if (field.beginDate != null){
            if (field.endDate != null) {
                beginYear = Number(field.beginDate.substring(0,4));
                endYear = Number(field.endDate.substring(0,4));
                for (let i = beginYear; i <= endYear; i++) {
                    years.push(i); // If we have a time range, push all the years in that range into the list of years array
                }
            }
            else {
                year = Number(field.beginDate.substring(0,4));
                years.push(year);
            }
        }
    });
    //console.log(years);
    frequencies = countFrequencies(years);
    //console.log(frequencies);
    return frequencies;
}

function calculateRollingAverage(data, points) {
    let rollingAvg = [];

    for (let i = 0; i < data.length; i++) {
        if (i < points - 1) {
            // Not enough data points to calculate average
            rollingAvg.push(null); // Placeholder for no data
        } else {
            let sum = 0;
            for (let j = 0; j < points; j++) {
                sum += data[i - j];
            }
            rollingAvg.push(sum / points);
        }
    }

    return rollingAvg;
}

function getViewOnMapButton(data) {
    buttonHtml = '<button type="button" class="btn btn-sm btn-primary" onclick="zoomToPoint('+data.lat+','+data.long+');"><i class="fas fa-map-marked-alt"></i> View on map</button> ';
    return buttonHtml;
}

function buildTimelineGroups(groupList) {
    var groupMasterList = {
        'Personal life': {
            id: 'Personal life',
            content: 'Personal life',
            style: 'color: red;'
            // Optional: a field 'className', 'style', 'order', [properties]
        },
        'Music making': {
            id: 'Music making',
            content: 'Music making',
            style: 'color: green;'
            // Optional: a field 'className', 'style', 'order', [properties]
        },
        'Education': {
            id: 'Education',
            content: 'Education',
            style: 'color: blue;'
            // Optional: a field 'className', 'style', 'order', [properties]
        },
        'Public celebration': {
            id: 'Public celebration',
            content: 'Public celebration',
            style: 'color: yellow;'
            // Optional: a field 'className', 'style', 'order', [properties]
        },
        'Business meeting': {
            id: 'Business meeting',
            content: 'Business meeting',
            style: 'color: purple;'
            // Optional: a field 'className', 'style', 'order', [properties]
        },
        'Coincidence': {
            id: 'Coincidence',
            content: 'Coincidence',
            style: 'color: orange;'
            // Optional: a field 'className', 'style', 'order', [properties]
        },
    };

    // For each group in the supplied group list, take the full entry from the master list and add it to the return structure.
    var groups = [];
    $.each(groupList, function(i, groupName){
        groups.push(groupMasterList[groupName]);
    });

    return groups;
}