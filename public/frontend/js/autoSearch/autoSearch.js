/* <![CDATA[ */
    jQuery(document).ready(function($) {
        'use strict';
        // auto search key word
        $(document).ready(function() {
            var bloodhound = new Bloodhound({
                datumTokenizer: Bloodhound.tokenizers.whitespace,
                queryTokenizer: Bloodhound.tokenizers.whitespace,
                remote: {
                    url: '/find?q=%QUERY%',
                    wildcard: '%QUERY%'
                },
            });
            $('#kiot-search').typeahead({
                hint: true,
                highlight: true,
                minLength: 1
                },
                {
                name: 'users',
                source: bloodhound,
                display: function(data) {
                    return data.name  //Input value to be set when you select a suggestion.
                },
                templates: {
                    empty: [
                        '<div class="list-group search-results-dropdown"><div class="list-group-item">Nothing found.</div></div>'
                    ],
                    header: [
                        '<div class="list-group search-results-dropdown">'
                    ],
                    suggestion: function(data) {
                    return '<div style="font-weight:normal; margin-top:-10px ! important;" class="list-group-item">' + data.name + '</div></div>'
                    }
                }
            });
            $('#kiot-search-mb').typeahead({
                hint: true,
                highlight: true,
                minLength: 1
                },
                {
                name: 'users',
                source: bloodhound,
                display: function(data) {
                    return data.name  //Input value to be set when you select a suggestion.
                },
                templates: {
                    empty: [
                        '<div class="list-group search-results-dropdown"><div class="list-group-item">Nothing found.</div></div>'
                    ],
                    header: [
                        '<div class="list-group search-results-dropdown">'
                    ],
                    suggestion: function(data) {
                    return '<div style="font-weight:normal; margin-top:-10px ! important;" class="list-group-item">' + data.name + '</div></div>'
                    }
                }
            });
        });
    });