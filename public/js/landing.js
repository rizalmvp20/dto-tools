(function(){
  const hero = document.querySelector('.left-hero');
  const images = [
    "https://images.unsplash.com/photo-1535223289827-42f1e9919769?q=80&w=1600&auto=format&fit=crop",
    "https://images.unsplash.com/photo-1469474968028-56623f02e42e?q=80&w=1600&auto=format&fit=crop",
    "https://images.unsplash.com/photo-1472214103451-9374bd1c798e?q=80&w=1600&auto=format&fit=crop"
  ];
  let idx = 0;

  function apply(){
    hero.style.setProperty('--bg-url', `url("${images[idx]}")`);
    hero.style.backgroundImage = 'none'; // make sure pseudo covers
    // swap image via ::before
    hero.querySelector(':scope').style; // noop to force repaint (Safari)
    hero.style.setProperty('--current', idx);
    hero.querySelector(':scope'); // noop
    hero.style; // noop
    hero.style.transition = 'none';
    hero.classList.remove('fade');
    requestAnimationFrame(()=> hero.classList.add('fade'));
    hero.style.setProperty('--image', `url("${images[idx]}")`);
    hero.style.setProperty('--image-prev', `url("${images[(idx-1+images.length)%images.length]}")`);
    hero.style.setProperty('--image-next', `url("${images[(idx+1)%images.length]}")`);
    hero.style.setProperty('--img', `url("${images[idx]}")`);
    hero.style.setProperty('--img-url', `url("${images[idx]}")`);
    hero.style.setProperty('--imgsrc', images[idx]);
    hero.style.setProperty('--imgsrc2', images[idx]);
    // actually change ::before background
    hero.style.setProperty('--hero-bg', `url("${images[idx]}")`);
    hero.style.setProperty('--hero-opacity', .95);
    hero.style.setProperty('--hero-size', 'cover');
    hero.style.setProperty('--hero-pos', 'center');
    hero.style.setProperty('--hero-repeat', 'no-repeat');
    hero.style.setProperty('--dummy', Math.random()); // trigger repaint
    hero.style.setProperty('--img-change', Date.now());
    hero.style.cssText = hero.style.cssText; // force
    hero.style.setProperty('--force', Date.now());
    hero.style.setProperty('--custom', `url("${images[idx]}")`);
    hero.style.setProperty('--image-url', `url("${images[idx]}")`);
    hero.style.setProperty('--imageurl', `url("${images[idx]}")`);
    hero.style.setProperty('--bg', `url("${images[idx]}")`);
    hero.style.setProperty('--u', images[idx]);

    // direct DOM: change ::before via styleSheets not allowed; fallback:
    hero.style.setProperty('--url', `url("${images[idx]}")`);
    hero.style.backgroundImage = `url("${images[idx]}")`;
    // since ::before used in CSS, also set inline background
  }

  // initial (use inline background for cross-browser)
  apply();

  document.getElementById('prevBtn').addEventListener('click', ()=>{
    idx = (idx - 1 + images.length) % images.length; apply();
  });
  document.getElementById('nextBtn').addEventListener('click', ()=>{
    idx = (idx + 1) % images.length; apply();
  });
})();
