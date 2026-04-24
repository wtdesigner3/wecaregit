<script type="text/javascript">
$(".cat").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $(".item-categoery li").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
});
$(document).ready(function() {
    $('#list').click(function(event){event.preventDefault();$('#products .item').addClass('list-group-items');});
    $('#grid').click(function(event){event.preventDefault();$('#products .item').removeClass('list-group-items');$('#products .item').addClass('grid-group-item');});
});
</script>