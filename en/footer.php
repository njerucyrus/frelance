<?php
/**
 * Created by PhpStorm.
 * User: New LAptop
 * Date: 30/06/2017
 * Time: 10:02
 */
?>
<!-- jQuery -->
<script src="../public/assets/js/jquery-1.10.2.min.js"></script>
<!-- jQuery Easing -->
<script src="../public/assets/js/jquery.easing.1.3.js"></script>
<!-- Bootstrap -->
<script src="../public/assets/js/bootstrap.js"></script>
<!-- Owl carousel -->
<script src="../public/assets/js/owl.carousel.min.js"></script>
<!-- Magnific Popup -->
<script src="../public/assets/js/jquery.magnific-popup.min.js"></script>
<!-- Superfish -->
<script src="../public/assets/js/hoverIntent.js"></script>
<script src="../public/assets/js/superfish.js"></script>
<!-- Easy Responsive Tabs -->
<script src="../public/assets/js/easyResponsiveTabs.js"></script>
<!-- FastClick for Mobile/Tablets -->
<script src="../public/assets/js/fastclick.js"></script>
<!-- Main JS -->
<script src="../public/assets/js/main.js"></script>


<script>

    //plugin bootstrap minus and plus
    //http://jsfiddle.net/laelitenetwork/puJ6G/
    $('.btn-number').click(function(e){
        e.preventDefault();

        fieldName = $(this).attr('data-field');
        type      = $(this).attr('data-type');
        var input = $("input[name='"+fieldName+"']");
        var currentVal = parseInt(input.val());
        if (!isNaN(currentVal)) {
            if(type == 'minus') {

                if(currentVal > input.attr('min')) {
                    input.val(currentVal - 1).change();
                }
                if(parseInt(input.val()) == input.attr('min')) {
                    $(this).attr('disabled', true);
                }

            } else if(type == 'plus') {

                if(currentVal < input.attr('max')) {
                    input.val(currentVal + 1).change();
                }
                if(parseInt(input.val()) == input.attr('max')) {
                    $(this).attr('disabled', true);
                }

            }
        } else {
            input.val(0);
        }
    });
    $('.input-number').focusin(function(){
        $(this).data('oldValue', $(this).val());
    });
    $('.input-number').change(function() {

        minValue =  parseInt($(this).attr('min'));
        maxValue =  parseInt($(this).attr('max'));
        valueCurrent = parseInt($(this).val());

        name = $(this).attr('name');
        if(valueCurrent >= minValue) {
            $(".btn-number[data-type='minus'][data-field='"+name+"']").removeAttr('disabled')
        } else {
            alert('Sorry, the minimum value was reached');
            $(this).val($(this).data('oldValue'));
        }
        if(valueCurrent <= maxValue) {
            $(".btn-number[data-type='plus'][data-field='"+name+"']").removeAttr('disabled')
        } else {
            alert('Sorry, the maximum value was reached');
            $(this).val($(this).data('oldValue'));
        }


    });
    $(".input-number").keydown(function (e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 190]) !== -1 ||
            // Allow: Ctrl+A
            (e.keyCode == 65 && e.ctrlKey === true) ||
            // Allow: home, end, left, right
            (e.keyCode >= 35 && e.keyCode <= 39)) {
            // let it happen, don't do anything
            return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });
</script>
<script>
    //get the input and UL list
    var input = document.getElementById('filesToUpload');
    var list = document.getElementById('fileList');

    //empty list for now...
    while (list.hasChildNodes()) {
        list.removeChild(ul.firstChild);
    }

    //for every file...
    for (var x = 0; x < input.files.length; x++) {
        //add to list
        var li = document.createElement('li');
        li.innerHTML = 'File ' + (x + 1) + ':  ' + input.files[x].name;
        list.append(li);
    }
</script>

<!--Start of Tawk.to Script-->
<script type="text/javascript">
    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    (function(){
        var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
        s1.async=true;
        s1.src='https://embed.tawk.to/58ed0642f7bbaa72709c5b75/default';
        s1.charset='UTF-8';
        s1.setAttribute('crossorigin','*');
        s0.parentNode.insertBefore(s1,s0);
    })();
</script>
<!--End of Tawk.to Script-->