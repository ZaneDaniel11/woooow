
        $(document).ready(function () {
            // Initially, hide all rows beyond the first 10
            $('table tbody tr:gt(4)').hide();

            // Keep track of whether the tables are currently expanded
            var tablesExpanded = false;

            // Handle the "Show More" or "Load Less" button click
            $('#showMoreBtn').on('click', function () {
                // Toggle visibility of the next 10 rows
                $('table tbody tr:lt(15)').toggle();

                // Update the button text based on visibility
                var buttonText = tablesExpanded ? 'Show More' : 'Load Less';
                $(this).text(buttonText);

                // Toggle the state of the tables
                tablesExpanded = !tablesExpanded;
            });

            // Handle the button click to load Table 1
            $('#stambyBtn').on('click', function () {
                loadTable('Table/TABLE-busStamby.php'); // Adjust the URL to your server-side script for Table 1
            });

            // Handle the button click to load Table 2
            $('#arrivalBtn').on('click', function () {
                loadTable('Table/TABLE-arrival.php'); // Adjust the URL to your server-side script for Table 2
            });

            // Handle the button click to load Table 3
            $('#departureBtn').on('click', function () {
                loadTable('Table/TABLE-departure.php'); // Adjust the URL to your server-side script for Table 3
            });

            function loadTable(url) {
                // Make an AJAX request to fetch data from the server
                $.ajax({
                    type: 'GET',
                    url: url,
                    dataType: 'html',
                    success: function (data) {
                        // Replace the content of the table container with the new table
                        $('.tableContainer').html(data);

                        // Hide the rows beyond the first 10 for the new table
                        $('table tbody tr:gt(9)').hide();
                        
                        // Add "Show More" button for the new table
                        var showMoreBtn = $('<button>', {
                            id: 'showMoreBtn',
                            text: 'Show More',
                            click: function () {
                                // Toggle visibility of the next 10 rows for the new table
                                $('table tbody tr:lt(4)').toggle();

                                // Update the button text based on visibility
                                var buttonText = tablesExpanded ? 'Show More' : 'Load Less';
                                $(this).text(buttonText);

                                // Toggle the state of the tables
                                tablesExpanded = !tablesExpanded;
                            }
                        });

                        // Append the "Show More" button to the container
                        $('.loadToggleContainer').html(showMoreBtn);

                        // Reset the state of the tables
                        tablesExpanded = false;
                    },
                    error: function () {
                        console.error('Error loading table');
                    }
                });
            }
        });
