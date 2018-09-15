function progressBar(  ) {
  $(".progress-bar").each(function () {
    var $target  = $(this);
    var opts = {
      percent: $target.data('percent'),
      duration: 2000
    };

    var circleWidth = $('.progress-bar').width();
    var circleWidth = Math.round(circleWidth);
    var halfCircleWidth =  Math.round(circleWidth/2);

    $('.left, .right, .rotate').css({
      'clip': 'rect(0px, ' + halfCircleWidth +'px, ' + circleWidth +'px, 0px)'
    });

    var $rotate = $target.find('.rotate');
    setTimeout(function () {
      $rotate.css({
        'transition': 'transform ' + opts.duration + 'ms linear',
        'transform': 'rotate(' + Math.round(opts.percent * 3.6) + 'deg)'
      });
    },1);

    if (opts.percent > 50) {
      var animationRight = 'toggle ' + (opts.duration / opts.percent * 50) + 'ms step-end';
      var animationLeft = 'toggle ' + (opts.duration / opts.percent * 50) + 'ms step-start';
      $target.find('.right').css({
        animation: animationRight,
        opacity: 1
      });
      $target.find('.left').css({
        animation: animationLeft,
        opacity: 0
      });
    }
  });
}
export default progressBar;