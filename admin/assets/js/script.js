jQuery(document).ready(function (event) {
  jQuery(".add_item_btn button").click(function () {
    jQuery(".add_item_form").show();
  });
  jQuery(".add_item_form .close_btn > a").click(function () {
    jQuery(".add_item_form").hide();
  });
});
