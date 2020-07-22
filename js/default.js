"use strict";

window.addEventListener('DOMContentLoaded', (event) => {
  /**
   * Include stylesheet which was deferred
   */
  let defaultCSS = document.getElementById('defaultCSS');
  defaultCSS.href = 'css/default.css';


  /**
   * Reveal E-Mail for Humans
   */
  let electronicMessages = document.getElementsByClassName('electronicMessage');

  if ( electronicMessages ) {
    for (var i = 0; i < electronicMessages.length; i++) {
      electronicMessages[i].classList.remove('fallbackUnlink');

      electronicMessages[i].onclick = function() {
        electronicMessages[i].href = 'mailto:' + atob(electronicMessages[i].dataset.href);
      };
    }
  }

  /**
   * Smooth Scroll
   */
  let scrollContainer = document.getElementById('imagePreview');
  let scrollDown = document.getElementById('scrollDown');
  let scrollUp = document.getElementById('scrollUp');

  if(scrollDown) {
    scrollDown.onclick = function() {
      scrollContainer.scrollBy({
        top: 1080,
        left: 0,
        behavior: 'smooth',
      });
    };
  }

  if(scrollUp) {
    scrollUp.onclick = function() {
      scrollContainer.scrollBy({
        top: -1080,
        left: 0,
        behavior: 'smooth',
      });
    };
  }


  /**
   * Toggle Menu
   */
  let menuToggle = document.getElementById('menuToggle');
  let menuMain = document.getElementById('menuMain');
  let header = document.getElementsByTagName('header');

  if(menuToggle) {
    header[0].classList.remove('noJS');

    menuToggle.onclick = function() {
      menuMain.classList.toggle('open');
      header[0].classList.toggle('open');
    }
  }


  /**
   * Body Footer
   */
  let bodyFooter = document.getElementById('bodyFooter');
  bodyFooter.classList.add('hide');

  window.addEventListener('scroll', function() {
    /**
     * User has Scrolled down
     */
    let logo = document.getElementById('logo');

    if(window.scrollY > logo.offsetHeight) {
      bodyFooter.classList.add('show');
      bodyFooter.classList.remove('hide');
    }
    else {
      bodyFooter.classList.remove('show');
      bodyFooter.classList.add('hide');
    }
  });


  /**
   * Body Footer
   * Scroll to Top
   */
  let backToTopAnchor = document.getElementById('backToTopAnchor');

  if(backToTopAnchor) {
    backToTopAnchor.removeAttribute('href');

    backToTopAnchor.onclick = function() {
      window.scrollTo({ // document.documentElement
        top: 0,
        left: 0,
        behavior: 'smooth'
      });
    };
  }


  /**
   * Body Footer
   * Open Menu
   */
  let backToMenuAnchor = document.getElementById('backToMenuAnchor');

  if(backToMenuAnchor) {
    backToMenuAnchor.classList.add('JS');

    backToMenuAnchor.onclick = function() {
      backToTopAnchor.click();

      /**
       * Don't perform click because we do not want to toggle the menu
       * it should open instead
       */
      menuMain.classList.add('open');
      header[0].classList.add('open');
    };
  }


  /**
   * Popup for images
   * Scroll
   */
  let imagePreview = document.getElementById('imagePreview');

  if(imagePreview) {
    let html = document.documentElement;
    let logo = document.getElementById('logo');
    let scrollDown = document.getElementById('scrollDown');
    let scrollUp = document.getElementById('scrollUp');

    imagePreview.addEventListener('scroll', function() {
      /**
       * User has Scrolled down
       */
      if(imagePreview.scrollTop > logo.offsetHeight) {
        imagePreview.classList.add('scrolled');

        scrollUp.classList.add('show');
        scrollUp.classList.remove('hide');
        scrollDown.classList.add('hide');
        scrollDown.classList.remove('show');
      }
      else {
        imagePreview.classList.remove('scrolled');

        scrollUp.classList.add('hide');
        scrollUp.classList.remove('show');
        scrollDown.classList.add('show');
        scrollDown.classList.remove('hide');
      }
    });
  }


  /**
   * Popup for images
   * Open
   */
  let anchors = document.getElementsByClassName('popup');

  for(let i = 0; i < anchors.length; i++) {
    let anchor = anchors[i];

    anchor.onclick = function(e) {
      let html = document.documentElement;
      let imagePreview = document.getElementById('imagePreview');
      let imageText = document.getElementById('imageText');
      let imageImage = document.getElementById('imageImage');
      let imageCaption = document.getElementById('imageCaption');
      let imageDescription = document.getElementById('imageDescription');

      html.classList.add('noscroll');
      imagePreview.style.display = 'grid';
      // imageImage.src = this.href ? this.href : '';
      console.log(imageImage.childElementCount);
      if(imageImage.childElementCount == 0) {
        imageImage.appendChild(anchor.firstElementChild.cloneNode(true));
      }
      imageCaption.innerHTML = this.dataset.caption ? this.dataset.caption : '';
      imageDescription.innerHTML = this.dataset.description ? this.dataset.description : '';

      e.preventDefault();

      if(!this.dataset.caption && !this.dataset.description) {
        imageText.style.display = 'none';
      }
    };
  }


  /**
   * Popup for images
   * Close
   */
  let imageClose = document.getElementById('imageClose');

  if(imageTop) {
    imageClose.onclick = function() {
      let html = document.documentElement;
      let imagePreview = document.getElementById('imagePreview');
      let imageText = document.getElementById('imageText');

      html.classList.remove('noscroll');
      imageText.style.display = 'grid';
      imagePreview.style.display = 'none';
    }
  }
});
