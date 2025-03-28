( function( window, document ) {
  function modern_furniture_store_keepFocusInMenu() {
    document.addEventListener( 'keydown', function( e ) {
      const modern_furniture_store_nav = document.querySelector( '.sidenav' );
      if ( ! modern_furniture_store_nav || ! modern_furniture_store_nav.classList.contains( 'open' ) ) {
        return;
      }
      const elements = [...modern_furniture_store_nav.querySelectorAll( 'input, a, button' )],
        modern_furniture_store_lastEl = elements[ elements.length - 1 ],
        modern_furniture_store_firstEl = elements[0],
        modern_furniture_store_activeEl = document.activeElement,
        tabKey = e.keyCode === 9,
        shiftKey = e.shiftKey;
      if ( ! shiftKey && tabKey && modern_furniture_store_lastEl === modern_furniture_store_activeEl ) {
        e.preventDefault();
        modern_furniture_store_firstEl.focus();
      }
      if ( shiftKey && tabKey && modern_furniture_store_firstEl === modern_furniture_store_activeEl ) {
        e.preventDefault();
        modern_furniture_store_lastEl.focus();
      }
    } );
  }
  modern_furniture_store_keepFocusInMenu();
} )( window, document );