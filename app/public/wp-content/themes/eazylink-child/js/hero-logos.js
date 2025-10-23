(function(){
  // Guard: run only when DOM is ready
  function ready(fn){
    if(document.readyState !== 'loading'){ fn(); }
    else { document.addEventListener('DOMContentLoaded', fn); }
  }

  ready(function(){
    var logoContainer = document.getElementById('logoContainer');
    if(!logoContainer) return; // run only if the block exists (front page)

    var mainLogo = document.getElementById('mainLogo');
    var satelliteLogos = Array.prototype.slice.call(document.querySelectorAll('.logo-item[data-index]:not(#mainLogo)'));
    var beamPaths = Array.prototype.slice.call(document.querySelectorAll('.beam-path'));

    var timeoutIds = [];
    var isPulsing = false;

    // Timings
    var PULSE_DURATION = 2000; // not directly used but kept for future tweaks
    var SEQUENTIAL_DELAY = 300;
    var BEAM_DURATION = 500;

    function shuffleArray(array){
      for (var i = array.length - 1; i > 0; i--) {
        var j = Math.floor(Math.random() * (i + 1));
        var tmp = array[i];
        array[i] = array[j];
        array[j] = tmp;
      }
      return array;
    }

    function animateBeam(beamPath, logo){
      if(!beamPath || !logo) return;
      var length = beamPath.getTotalLength();
      beamPath.style.strokeDasharray = length;
      beamPath.style.strokeDashoffset = length;

      beamPath.classList.add('active');
      // trigger animation to draw
      requestAnimationFrame(function(){
        beamPath.style.strokeDashoffset = 0;
      });

      logo.classList.add('active-satellite');

      var offTimeoutId = setTimeout(function(){
        beamPath.style.strokeDashoffset = length;
        beamPath.classList.remove('active');
        logo.classList.remove('active-satellite');
      }, BEAM_DURATION + 100);
      timeoutIds.push(offTimeoutId);
    }

    function startAnimationCycle(){
      var shuffledIndices = shuffleArray(Array.from({length: satelliteLogos.length}, function(_, i){ return i; }));

      beamPaths.forEach(function(b){
        b.classList.remove('active');
        var len = b.getTotalLength();
        b.style.strokeDashoffset = len;
      });
      satelliteLogos.forEach(function(l){ l.classList.remove('active-satellite'); });

      shuffledIndices.forEach(function(originalIndex, sequenceIndex){
        var logo = satelliteLogos[originalIndex];
        var beamPath = beamPaths.find(function(b){ return b.getAttribute('data-index') == (originalIndex + 1); });
        var delay = sequenceIndex * SEQUENTIAL_DELAY;
        var onTimeoutId = setTimeout(function(){ animateBeam(beamPath, logo); }, delay);
        timeoutIds.push(onTimeoutId);
      });
    }

    function startAnimation(){
      if(isPulsing) return;
      isPulsing = true;
      if(mainLogo) mainLogo.classList.add('active');

      startAnimationCycle();

      var sequenceTotalTime = (satelliteLogos.length * SEQUENTIAL_DELAY) + BEAM_DURATION;
      var repeatInterval = setInterval(function(){
        if(isPulsing) startAnimationCycle();
        else clearInterval(repeatInterval);
      }, sequenceTotalTime + 500);

      timeoutIds.push(repeatInterval);
    }

    function stopAnimation(){
      isPulsing = false;
      timeoutIds.forEach(function(id){ clearInterval(id); clearTimeout(id); });
      timeoutIds = [];

      if(mainLogo) mainLogo.classList.remove('active');
      beamPaths.forEach(function(b){
        b.classList.remove('active');
        try { b.style.strokeDashoffset = b.getTotalLength(); } catch(e) {}
      });
      satelliteLogos.forEach(function(logo){ logo.classList.remove('active-satellite'); });
    }

    logoContainer.addEventListener('mouseenter', startAnimation);
    logoContainer.addEventListener('mouseleave', stopAnimation);

    window.addEventListener('load', function(){
      beamPaths.forEach(function(b){
        try {
          var length = b.getTotalLength();
          b.style.strokeDasharray = length;
          b.style.strokeDashoffset = length;
        } catch(e) {}
      });
    });
  });
})();
