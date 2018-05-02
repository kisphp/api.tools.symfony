function inverseSelected() {
  $('.dim-select').each(function () {
    $(this).prop("checked", !$(this).prop('checked'));
  });
}

function refreshIframe(element) {
  let the_id = element.attr('id');
  let selector = $('#iframe-' + the_id);
  let iframe_src = selector.attr('src');
  selector.attr('src', iframe_src);
}

module.exports = {
  init: () => {
    $('.inverse-select').click(function (e) {
      e.preventDefault();
      inverseSelected();
    });
    $('.refresh-iframe').click(function (e) {
      e.preventDefault();
      refreshIframe($(this));
    });
  }
};
