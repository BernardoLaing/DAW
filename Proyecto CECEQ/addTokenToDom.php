<script>
    $(document).ready(function (e) {
        $.setCsrfToken(<?php echo  "'".$_SESSION["csrfToken"]."'" ?>);
        $("form").first().append($("<input/>", {
            type: "text",
            name: "csrf",
            id: "csrfTokenInput",
            value: $.getCsrfToken(), //:v
            style: "visibility: hidden"
        }));
    });
</script>
