<?php 
    echo " <div class=\"w3-sidebar w3-bar-block w3-light-grey w3-card\" style=\"width:200px;\">
        <a href=\"../\" class=\"w3-bar-item w3-button\">System Statistics</a>
        <a href=\"../../under/\" class=\"w3-bar-item w3-button\">Report</a>
        <button class=\"w3-button w3-block w3-left-align\" onclick=\"myAccFunc()\">
  Portfolio <i class=\"fa fa-caret-down\"></i>
  </button>
        <div id=\"demoAcc\" class=\"w3-hide w3-white w3-card\">
            <a href=\"../addPortfolio.html\" class=\"w3-bar-item w3-button\">Add Portfolio</a>
            <a href=\"../../under/\" class=\"w3-bar-item w3-button\">Update Portfolio</a>
            <a href=\"../portfolioAction/deletePortfolio.php\" class=\"w3-bar-item w3-button\">Delete Portfolio</a>
            <a href=\"../../under/'\" class=\"w3-bar-item w3-button\">Import Portfolio</a>
            <a href=\"../../under/\" class=\"w3-bar-item w3-button\">Export Portfolio</a>
            <a href=\"../portfolioAction/\" class=\"w3-bar-item w3-button\">Approve Portfolio Request</a>
        </div>
        <a href="" class=\"w3-bar-item w3-button\">Send Notification</a>
    </div>

    <script>
        function myAccFunc() {
            var x = document.getElementById(\"demoAcc\");
            if (x.className.indexOf(\"w3-show\") == -1) {
                x.className += \"w3-show\";
                x.previousElementSibling.className += \"w3-blue-grey\";
            } else {
                x.className = x.className.replace(\"w3-show\", \"\");
                x.previousElementSibling.className =
                    x.previousElementSibling.className.replace(\"w3-blue-grey\", \"\");
            }
        }

        function myDropFunc() {
            var x = document.getElementById(\"demoDrop\");
            if (x.className.indexOf(\"w3-show\") == -1) {
                x.className += \"w3-show\";
                x.previousElementSibling.className += \"w3-blue-grey\";
            } else {
                x.className = x.className.replace(\"w3-show\", \"\");
                x.previousElementSibling.className =
                    x.previousElementSibling.className.replace(\"w3-blue-grey\", "");
            }
        }

    </script>";


?>
