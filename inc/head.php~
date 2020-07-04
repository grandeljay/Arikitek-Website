  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <!-- Basic Info -->
  <meta name="author" content="Arikitek">
  <meta name="description" content="Arikitek are the creators of OpsApp - an innovative approach to managing your smart phone Address Book.">
  
  <!-- Open Graph Data -->
  <meta property="og:title" content="Arikitek">  
  <meta property="og:description" content="Arikitek are the creators of OpsApp - an innovative approach to managing your smart phone Address Book.">
  <meta property="og:image" content="img/opsapp-logo.png"><!-- PLACE AN ABSOLUTE PATH HERE -->  
  
  <!-- favicon -->
  <meta name="apple-mobile-web-app-title" content="Arikitek">
  <meta name="application-name" content="Arikitek">
  <meta name="msapplication-TileColor" content="#2b5797">
  <meta name="theme-color" content="#ffffff">    
  
  <link rel="apple-touch-icon" sizes="180x180" href="apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="favicon-16x16.png">
  <link rel="manifest" href="site.webmanifest">
  <link rel="mask-icon" href="safari-pinned-tab.svg" color="#5bbad5">
      
  <!-- Critical CSS -->
  <style type="text/css">
    :root {
      --colourWhite: #fff;
      --colourBlack: #333;
      --colourPrimary: #24adba;
      --colourPrimaryDark: #197093;
      --colourSecondary: #5a5a5a;
      
      --radii: 2px;
      --radiix2: 4px;
      
      --shadowDefault:
          1px 1px 1px rgba(100,100,100,0.12), 
          2px 2px 2px rgba(100,100,100,0.12), 
          4px 4px 4px rgba(100,100,100,0.12), 
          8px 8px 8px rgba(100,100,100,0.12);      
      --shadowDefaultInset:
          1px 1px 1px rgba(100,100,100,0.12) inset, 
          2px 2px 2px rgba(100,100,100,0.12) inset, 
          4px 4px 4px rgba(100,100,100,0.12) inset, 
          8px 8px 8px rgba(100,100,100,0.12) inset;                
      --shadowSidebar:
          1px 0 1px rgba(100,100,100,0.12), 
          2px 0 2px rgba(100,100,100,0.12), 
          4px 0 4px rgba(100,100,100,0.12), 
          8px 0 8px rgba(100,100,100,0.12);
      --shadowTopbar:
          0 1px 1px rgba(100,100,100,0.12), 
          0 2px 2px rgba(100,100,100,0.12), 
          0 4px 4px rgba(100,100,100,0.12);
      --shadowDrop: var(--radii) var(--radii) var(--radiix2) rgba(100,100,100,0.4); 
    }

    body {
      margin: 0;
    }
    
    .wrapper {
      display: grid;
      grid-template-columns: 1fr 3fr;
      grid-template-rows: 1fr max-content;
                  
      min-height: 100vh;
      font-size: 18pt;
    }
    
    img {
      max-width: 100%;
    }        
    
    h1 {
      margin: 4rem;
    }
    
    header {
      grid-row: 1 / 2;
      grid-column: 1 / 2;
      
      color: var(--colourWhite);
      background-color: var(--colourPrimaryDark);            
    }
                    
    header #logo {        
      padding: 24px;
      font-size: 2em;
      
      background-color: #f4f4f4;            
    }

    header #logo .ariki {
      color: var(--colourPrimary);
    }

    header #logo .tek {
      color: var(--colourSecondary);
    }    
    
    header nav ul {
      margin: 0;
      padding: 0;

      list-style-type: none;
    }        
                
    header nav > ul li a {
      display: block;
      padding: 24px;
    }

    header #logo.icon > a:before,
    header nav > ul li.icon > a:before {
      content: '';
      display: inline-block;
      width: 24px;
      height: 24px;
      margin-right: 8px;
      margin-bottom: 2px;
    }    
    
    #main {
      grid-row: 1 / 3;
      grid-column: 2 / 3;
      
      background-color: #f9fafb;
    }
    
    aside,
    section {
      padding: 1rem;
    }        
    
    .skew {
      margin: 4rem 0;
      padding: 4rem;            
    }
    
    fieldset {
      padding: 0;
      margin: 0;
      
      border: none;
    }
    
    fieldset div {
      display: grid;
      grid-template-columns: minmax(max-content, 12vw) auto;
      grid-template-rows: auto auto;
      grid-gap: 0.2em 1em;
    }
    
    fieldset div legend {      
      grid-column: 2 / 3;
      grid-row: 2 / 3;
    }
    
    #bodyFooter {
	    display: grid;
	    grid-gap: 1rem;
	    grid-template-columns: max-content max-content;
	    justify-content: flex-end;
	    
	    padding: 0 4rem 2rem 4rem;
    }    
    
    footer {
      grid-column: 1 / 2;
      grid-row: 2 / 3;
      
      padding: 1em;
      font-size: 12pt;
      
      color: var(--colourWhite);
      background-color: var(--colourBlack);            
    }    
    
    #backToTopAnchor,
    #backToMenuAnchor,
    #imagePreview,
    #outdatedBrowser {
      display: none;
    }        
    
    #backToMenuAnchor {
      opacity: 0;
    }
    
    @media(max-width: 1280px) {
      .wrapper {
        grid-template-columns: 1fr 2fr;
      }
    }

    @media(max-width: 1024px) {

    }

    @media(max-width: 768px) {
      .wrapper {
        grid-template-columns: 1fr;
        grid-template-rows: max-content;
      }
      
      header {
        position: relative;
        
        grid-row: 1 / 2;
      }
      
      header #logo {        
        padding: 18px 24px;
        font-size: 1.6em;
      }        
      
      header nav {
        display: none;
      }
      
      #main {
        grid-row: 2 / 3;
        grid-column: 1 / 2;
      }
      
      footer {
        grid-row: 3 / 4;
        grid-column: 1 / 2;
      }
    }    
    
    @media(max-width: 512px) {
      h1 {
        margin: 1rem;
      }
      
      table {
        margin: 0;
      }        
      
      .skew {
        padding: 2rem 1rem;            
      }
    }
  </style>    
  
  <!-- If JavaScript is enabled, defer script here -->
  <link rel="preload" href="css/default.css" as="style" id="defaultCSS">

  <!-- Fallback to normal loading if JavaScript is not enabled -->
  <noscript><link rel="stylesheet" href="css/default.css"></noscript>  
  
  <!-- Defer JavaScript so the DOM can continue loading -->
  <script defer src="js/default.js"></script>
