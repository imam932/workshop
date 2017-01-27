$(function() {
    var textContainerHeight= $('.incidentCellBottomRight').height();

    $('.multilineEllipseText').each(function () {
      var $ellipsisText = $(this);

      while ($ellipsisText.outerHeight(true) > textContainerHeight) {
        $ellipsisText.text(function(index, text) {
          return text.replace(/\W*\s(\S)*$/, '...');
        });
      }
    });
});
