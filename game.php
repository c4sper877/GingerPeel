
<!-- Your Cards -->
<script type="text/javascript" src="scripts/js/jquery.js"></script>
<script>
    function refresh_div() {
        jQuery.ajax({
            url:'/scripts/game/yourcards.php',
            type:'POST',
            success:function(results) {
                jQuery(".result").html(results);
            }
        });
    }

    t = setInterval(refresh_div,1000);
</script>



<div class="result"></div>