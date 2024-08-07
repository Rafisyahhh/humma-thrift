'use strict';

window.isDarkStyle = window.Helpers.isDarkStyle();
let menu, animate, isHorizontalLayout = false;

if (document.getElementById('layout-menu')) {
  isHorizontalLayout = document.getElementById('layout-menu').classList.contains('menu-horizontal');
}

(function () {
  setTimeout(() => window.Helpers.initCustomOptionCheck(), 1000);

  if (typeof Waves !== 'undefined') {
    Waves.init();
    Waves.attach(".btn[class*='btn-']:not([class*='btn-outline-']):not([class*='btn-label-'])", ['waves-light']);
    Waves.attach("[class*='btn-outline-']");
    Waves.attach("[class*='btn-label-']");
    Waves.attach('.pagination .page-item .page-link');
  }

  let layoutMenuEl = document.querySelectorAll('#layout-menu');
  layoutMenuEl.forEach((element) => {
    menu = new Menu(element, {
      orientation: isHorizontalLayout ? 'horizontal' : 'vertical',
      closeChildren: isHorizontalLayout,
      showDropdownOnHover: localStorage.getItem('templateCustomizer-' + templateName + '--ShowDropdownOnHover')
        ? localStorage.getItem('templateCustomizer-' + templateName + '--ShowDropdownOnHover') === 'true'
        : window.templateCustomizer !== undefined
          ? window.templateCustomizer.settings.defaultShowDropdownOnHover
          : true
    });
    window.Helpers.scrollToActive((animate = false));
    window.Helpers.mainMenu = menu;
  });

  let menuToggler = document.querySelectorAll('.layout-menu-toggle');
  menuToggler.forEach(item => {
    item.addEventListener('click', event => {
      event.preventDefault();
      window.Helpers.toggleCollapsed();
      if (config.enableMenuLocalStorage && !window.Helpers.isSmallScreen()) {
        try {
          localStorage.setItem(
            'templateCustomizer-' + templateName + '--LayoutCollapsed',
            String(window.Helpers.isCollapsed())
          );
          let layoutCollapsedCustomizerOptions = document.querySelector('.template-customizer-layouts-options');
          if (layoutCollapsedCustomizerOptions) {
            let layoutCollapsedVal = window.Helpers.isCollapsed() ? 'collapsed' : 'expanded';
            layoutCollapsedCustomizerOptions.querySelector(`input[value="${layoutCollapsedVal}"]`).click();
          }
        } catch (e) { }
      }
    });
  });

  window.Helpers.swipeIn('.drag-target', function (e) {
    window.Helpers.setCollapsed(false);
  });

  window.Helpers.swipeOut('#layout-menu', function (e) {
    if (window.Helpers.isSmallScreen()) window.Helpers.setCollapsed(true);
  });

  let menuInnerContainer = document.getElementsByClassName('menu-inner')[0],
    menuInnerShadow = document.getElementsByClassName('menu-inner-shadow')[0];

  if (menuInnerContainer && menuInnerShadow) {
    menuInnerContainer.addEventListener('ps-scroll-y', function () {
      menuInnerShadow.style.display = this.querySelector('.ps__thumb-y').offsetTop ? 'block' : 'none';
    });
  }

  function switchImage(style) {
    if (style === 'system') {
      style = window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light';
    }
    const switchImagesList = [].slice.call(document.querySelectorAll('[data-app-' + style + '-img]'));
    switchImagesList.forEach(imageEl => {
      const setImage = imageEl.getAttribute('data-app-' + style + '-img');
      imageEl.src = assetsPath + 'img/' + setImage;
    });
  }

  let styleSwitcher = document.querySelector('.dropdown-style-switcher');
  let storedStyle = localStorage.getItem('templateCustomizer-' + templateName + '--Style') ||
    (window.templateCustomizer?.settings?.defaultStyle ?? 'light');

  if (window.templateCustomizer && styleSwitcher) {
    let styleSwitcherItems = [].slice.call(styleSwitcher.children[1].querySelectorAll('.dropdown-item'));
    styleSwitcherItems.forEach(item => {
      item.addEventListener('click', function () {
        let currentStyle = this.getAttribute('data-theme');
        window.templateCustomizer.setStyle(currentStyle);
      });
    });

    const styleSwitcherIcon = styleSwitcher.querySelector('i');

    if (storedStyle === 'light') {
      styleSwitcherIcon.classList.add('ti-sun');
      new bootstrap.Tooltip(styleSwitcherIcon, {
        title: 'Light Mode',
        fallbackPlacements: ['bottom']
      });
    } else if (storedStyle === 'dark') {
      styleSwitcherIcon.classList.add('ti-moon');
      new bootstrap.Tooltip(styleSwitcherIcon, {
        title: 'Dark Mode',
        fallbackPlacements: ['bottom']
      });
    } else {
      styleSwitcherIcon.classList.add('ti-device-desktop');
      new bootstrap.Tooltip(styleSwitcherIcon, {
        title: 'System Mode',
        fallbackPlacements: ['bottom']
      });
    }
  }

  switchImage(storedStyle);

  const notificationMarkAsReadAll = document.querySelector('.dropdown-notifications-all');
  const notificationMarkAsReadList = document.querySelectorAll('.dropdown-notifications-read');

  if (notificationMarkAsReadAll) {
    notificationMarkAsReadAll.addEventListener('click', () => {
      notificationMarkAsReadList.forEach(item => {
        item.closest('.dropdown-notifications-item').classList.add('marked-as-read');
      });
    });
  }

  if (notificationMarkAsReadList) {
    notificationMarkAsReadList.forEach(item => {
      item.addEventListener('click', () => {
        item.closest('.dropdown-notifications-item').classList.toggle('marked-as-read');
      });
    });
  }

  const notificationArchiveMessageList = document.querySelectorAll('.dropdown-notifications-archive');
  notificationArchiveMessageList.forEach(item => {
    item.addEventListener('click', () => {
      item.closest('.dropdown-notifications-item').remove();
    });
  });

  const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
  tooltipTriggerList.map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl));

  const accordionActiveFunction = function (e) {
    e.target.closest('.accordion-item').classList.toggle('active', e.type === 'show.bs.collapse');
  };

  const accordionTriggerList = [].slice.call(document.querySelectorAll('.accordion'));
  accordionTriggerList.forEach(accordionTriggerEl => {
    accordionTriggerEl.addEventListener('show.bs.collapse', accordionActiveFunction);
    accordionTriggerEl.addEventListener('hide.bs.collapse', accordionActiveFunction);
  });

  window.Helpers.setAutoUpdate(true);
  window.Helpers.initPasswordToggle();
  window.Helpers.initSpeechToText();
  window.Helpers.initNavbarDropdownScrollbar();

  let horizontalMenuTemplate = document.querySelector("[data-template^='horizontal-menu']");
  if (horizontalMenuTemplate) {
    window.Helpers.setNavbarFixed(window.innerWidth < window.Helpers.LAYOUT_BREAKPOINT ? 'fixed' : '');
  }

  window.addEventListener('resize', () => {
    if (window.innerWidth >= window.Helpers.LAYOUT_BREAKPOINT) {
      let searchInputWrapper = document.querySelector('.search-input-wrapper');
      if (searchInputWrapper) {
        searchInputWrapper.classList.add('d-none');
        searchInputWrapper.querySelector('.search-input').value = '';
      }
    }
    if (horizontalMenuTemplate) {
      window.Helpers.setNavbarFixed(window.innerWidth < window.Helpers.LAYOUT_BREAKPOINT ? 'fixed' : '');
      setTimeout(() => {
        if (document.getElementById('layout-menu')) {
          menu.switchMenu(window.innerWidth < window.Helpers.LAYOUT_BREAKPOINT ? 'vertical' : 'horizontal');
        }
      }, 100);
    }
  }, true);

  if (!isHorizontalLayout && !window.Helpers.isSmallScreen() && config.enableMenuLocalStorage) {
    try {
      window.Helpers.setCollapsed(localStorage.getItem('templateCustomizer-' + templateName + '--LayoutCollapsed') === 'true', false);
    } catch (e) { }
  }
})();

// if (typeof $ !== 'undefined') {
//   $(function () {
//     window.Helpers.initSidebarToggle();

//     var searchToggler = $('.search-toggler'),
//       searchInputWrapper = $('.search-input-wrapper'),
//       searchInput = $('.search-input'),
//       contentBackdrop = $('.content-backdrop');

//     if (searchToggler.length) {
//       searchToggler.on('click', function () {
//         if (searchInputWrapper.length) {
//           searchInputWrapper.toggleClass('d-none');
//           searchInput.focus();
//         }
//       });
//     }

//     $(document).on('keydown', function (event) {
//       if (event.ctrlKey && event.which === 191) {
//         if (searchInputWrapper.length) {
//           searchInputWrapper.toggleClass('d-none');
//           searchInput.focus();
//         }
//       }
//     });

//     setTimeout(() => {
//       var twitterTypeahead = $('.twitter-typeahead');
//       searchInput.on('focus', function () {
//         if (searchInputWrapper.hasClass('container-xxl')) {
//           searchInputWrapper.find(twitterTypeahead).addClass('container-xxl');
//           twitterTypeahead.removeClass('container-fluid');
//         } else if (searchInputWrapper.hasClass('container-fluid')) {
//           searchInputWrapper.find(twitterTypeahead).addClass('container-fluid');
//           twitterTypeahead.removeClass('container-xxl');
//         }
//       });
//     }, 10);

//     if (searchInput.length) {
//       var filterConfig = function (data) {
//         return function findMatches(q, cb) {
//           let matches = [];
//           data.filter(function (i) {
//             if (i.name.toLowerCase().startsWith(q.toLowerCase()) || i.name.toLowerCase().includes(q.toLowerCase())) {
//               matches.push(i);
//               matches.sort((a, b) => b.name < a.name ? 1 : -1);
//             }
//           });
//           cb(matches);
//         };
//       };

//       var searchJson = $('#layout-menu').hasClass('menu-horizontal') ? 'search-horizontal.json' : 'search-vertical.json';
//       var searchData = $.ajax({
//         url: assetsPath + 'json/' + searchJson,
//         dataType: 'json',
//         async: false
//       }).responseJSON;

//       searchInput.each(function () {
//         var $this = $(this);
//         searchInput
//           .typeahead(
//             {
//               hint: false,
//               classNames: {
//                 menu: 'tt-menu navbar-search-suggestion',
//                 cursor: 'active',
//                 suggestion: 'suggestion d-flex justify-content-between px-3 py-2 w-100'
//               }
//             },
//             {
//               name: 'pages',
//               display: 'name',
//               limit: 5,
//               source: filterConfig(searchData.pages),
//               templates: {
//                 header: '<h6 class="suggestions-header text-primary mb-0 mx-3 mt-3 pb-2">Pages</h6>',
//                 suggestion: function ({ url, icon, name }) {
//                   return (
//                     '<a href="' + url + '">' +
//                     '<div>' +
//                     '<i class="ti ' + icon + ' me-2"></i>' +
//                     '<span class="align-middle">' + name + '</span>' +
//                     '</div>' +
//                     '</a>'
//                   );
//                 },
//                 notFound:
//                   '<div class="not-found px-3 py-2">' +
//                   '<h6 class="suggestions-header text-primary mb-2">Pages</h6>' +
//                   '<p class="py-2 mb-0"><i class="ti ti-alert-circle ti-xs me-2"></i> No Results Found</p>' +
//                   '</div>'
//               }
//             },
//             {
//               name: 'files',
//               display: 'name',
//               limit: 4,
//               source: filterConfig(searchData.files),
//               templates: {
//                 header: '<h6 class="suggestions-header text-primary mb-0 mx-3 mt-3 pb-2">Files</h6>',
//                 suggestion: function ({ src, name, subtitle, meta }) {
//                   return (
//                     '<a href="javascript:;">' +
//                     '<div class="d-flex w-50">' +
//                     '<img class="me-3" src="' + assetsPath + src + '" alt="' + name + '" height="32">' +
//                     '<div class="w75">' +
//                     '<h6 class="mb-0">' + name + '</h6>' +
//                     '<small class="text-muted">' + subtitle + '</small>' +
//                     '</div>' +
//                     '</div>' +
//                     '<small class="text-muted">' + meta + '</small>' +
//                     '</a>'
//                   );
//                 },
//                 notFound:
//                   '<div class="not-found px-3 py-2">' +
//                   '<h6 class="suggestions-header text-primary mb-2">Files</h6>' +
//                   '<p class="py-2 mb-0"><i class="ti ti-alert-circle ti-xs me-2"></i> No Results Found</p>' +
//                   '</div>'
//               }
//             },
//             {
//               name: 'members',
//               display: 'name',
//               limit: 4,
//               source: filterConfig(searchData.members),
//               templates: {
//                 header: '<h6 class="suggestions-header text-primary mb-0 mx-3 mt-3 pb-2">Members</h6>',
//                 suggestion: function ({ name, src, subtitle }) {
//                   return (
//                     '<a href="app-user-view-account.html">' +
//                     '<div class="d-flex align-items-center">' +
//                     '<img class="rounded-circle me-3" src="' + assetsPath + src + '" alt="' + name + '" height="32">' +
//                     '<div class="user-info">' +
//                     '<h6 class="mb-0">' + name + '</h6>' +
//                     '<small class="text-muted">' + subtitle + '</small>' +
//                     '</div>' +
//                     '</div>' +
//                     '</a>'
//                   );
//                 },
//                 notFound:
//                   '<div class="not-found px-3 py-2">' +
//                   '<h6 class="suggestions-header text-primary mb-2">Members</h6>' +
//                   '<p class="py-2 mb-0"><i class="ti ti-alert-circle ti-xs me-2"></i> No Results Found</p>' +
//                   '</div>'
//               }
//             }
//           )
//           .bind('typeahead:render', () => contentBackdrop.addClass('show').removeClass('fade'))
//           .bind('typeahead:select', (ev, suggestion) => { if (suggestion.url) window.location = suggestion.url; })
//           .bind('typeahead:close', () => {
//             searchInput.val('');
//             $this.typeahead('val', '');
//             searchInputWrapper.addClass('d-none');
//             contentBackdrop.addClass('fade').removeClass('show');
//           });

//         var psSearch;
//         $('.navbar-search-suggestion').each(function () {
//           psSearch = new PerfectScrollbar($(this)[0], {
//             wheelPropagation: false,
//             suppressScrollX: true
//           });
//         });

//         searchInput.on('keyup', () => psSearch.update());
//       });
//     }
//   });
// }
