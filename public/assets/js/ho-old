/*
* Versão: 1.2.0 (Adaptado para Livewire 3)
* Template: Hope-Ui - Responsive Bootstrap 5 Admin Dashboard Template
* Autor: iqonic.design
* Adaptado por: Gemini
* NOTA: Este arquivo foi reestruturado para funcionar corretamente com a navegação "wire:navigate" do Livewire 3.
* Todas as inicializações de plugins e listeners de eventos agora são tratadas por uma função central que é
* chamada em cada navegação do Livewire.
*/

"use strict";

/**
 * Função principal que inicializa todos os scripts e plugins do template.
 * Ela é chamada na carga inicial da página e em cada evento de navegação do Livewire.
 */
const initializeHopeUI = () => {
  /*---------------------------------------------------------------------
                Sticky-Nav
  -----------------------------------------------------------------------*/
  const navsSticky = document.querySelector(".navs-sticky");
  if (navsSticky) {
    window.addEventListener('scroll', function () {
      let yOffset = window.scrollY;
      if (yOffset >= 100) {
        navsSticky.classList.add("menu-sticky");
      } else {
        navsSticky.classList.remove("menu-sticky");
      }
    });
  }

  /*---------------------------------------------------------------------
                Popover
  -----------------------------------------------------------------------*/
  if (typeof bootstrap !== typeof undefined) {
    const popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'));
    popoverTriggerList.map(function (popoverTriggerEl) {
      new bootstrap.Popover(popoverTriggerEl);
    });
  }

  /*---------------------------------------------------------------------
                  Tooltip
  -----------------------------------------------------------------------*/
  if (typeof bootstrap !== typeof undefined) {
    const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"], [data-sidebar-toggle="tooltip"]'));
    tooltipTriggerList.map(function (tooltipTriggerEl) {
      new bootstrap.Tooltip(tooltipTriggerEl);
    });
  }

  /*---------------------------------------------------------------------
                Circle Progress
  -----------------------------------------------------------------------*/
  const progressBar = document.getElementsByClassName('circle-progress');
  if (typeof CircleProgress !== 'undefined') {
    Array.from(progressBar, (elem) => {
      const minValue = elem.getAttribute('data-min-value');
      const maxValue = elem.getAttribute('data-max-value');
      const value = elem.getAttribute('data-value');
      const type = elem.getAttribute('data-type');
      if (elem.getAttribute('id')) {
        new CircleProgress('#' + elem.getAttribute('id'), {
          min: minValue,
          max: maxValue,
          value: value,
          textFormat: type,
        });
      }
    });
  }

  /*---------------------------------------------------------------------
                Progress Bar
  -----------------------------------------------------------------------*/
  const progressBarInit = (elem) => {
    const currentValue = elem.getAttribute('aria-valuenow');
    elem.style.width = '0%';
    elem.style.transition = 'width 2s';
    if (typeof Waypoint !== typeof undefined) {
      new Waypoint({
        element: elem,
        handler: function () {
          setTimeout(() => {
            elem.style.width = currentValue + '%';
          }, 100);
          this.destroy(); // Para garantir que o Waypoint seja disparado apenas uma vez
        },
        offset: 'bottom-in-view',
      });
    }
  };
  const customProgressBar = document.querySelectorAll('[data-toggle="progress-bar"]');
  Array.from(customProgressBar, progressBarInit);


  /*---------------------------------------------------------------------
                 noUiSlider
  -----------------------------------------------------------------------*/
  if (typeof noUiSlider !== 'undefined') {
    const rangeSlider = document.querySelectorAll('.range-slider');
    Array.from(rangeSlider, (elem) => {
      noUiSlider.create(elem, {
        start: [20, 80],
        connect: true,
        range: {
          'min': 0,
          'max': 100
        }
      });
    });

    const slider = document.querySelectorAll('.slider');
    Array.from(slider, (elem) => {
      noUiSlider.create(elem, {
        start: 50,
        connect: [true, false],
        range: {
          'min': 0,
          'max': 100
        }
      });
    });
  }

  /*---------------------------------------------------------------------
                Copy To Clipboard
  -----------------------------------------------------------------------*/
  const copy = document.querySelectorAll('[data-toggle="copy"]');
  if (copy) {
    Array.from(copy, (elem) => {
      elem.addEventListener('click', (e) => {
        e.preventDefault();
        const target = elem.getAttribute("data-copy-target");
        let value = elem.getAttribute("data-copy-value");
        const container = document.querySelector(target);
        if (container) {
          if (container.value) {
            value = container.value;
          } else {
            value = container.innerHTML;
          }
        }
        if (value) {
          const tempInput = document.createElement("input");
          document.body.appendChild(tempInput);
          tempInput.value = value;
          tempInput.select();
          document.execCommand("copy");
          tempInput.remove();
        }
      });
    });
  }

  /*---------------------------------------------------------------------
                CounterUp 2
  -----------------------------------------------------------------------*/
  if (window.counterUp !== undefined) {
    const counterUp = window.counterUp["default"];
    const counterUp2 = document.querySelectorAll('.counter');
    Array.from(counterUp2, (el) => {
      if (typeof Waypoint !== typeof undefined) {
        new Waypoint({
          element: el,
          handler: function () {
            counterUp(el, {
              duration: 1000,
              delay: 10,
            });
            this.destroy();
          },
          offset: "bottom-in-view",
        });
      }
    });
  }

  /*---------------------------------------------------------------------
                SliderTab
  -----------------------------------------------------------------------*/
  Array.from(document.querySelectorAll('[data-toggle="slider-tab"]'), (elem) => {
    if (typeof SliderTab !== 'undefined') {
      new SliderTab(elem);
    }
  });

  /*---------------------------------------------------------------------
                Swiper
  -----------------------------------------------------------------------*/
  const swiperCards = document.querySelectorAll('.d-slider1');
  Array.from(swiperCards, (swiperCard) => {
    if (typeof Swiper !== typeof undefined) {
      new Swiper(swiperCard, {
        slidesPerView: 1,
        spaceBetween: 20,
        loop: true,
        pagination: {
          el: '.swiper-pagination',
          clickable: true,
        },
        navigation: {
          nextEl: '.swiper-button-next',
          prevEl: '.swiper-button-prev',
        },
        breakpoints: {
          // when window width is >= 320px
          320: {
            slidesPerView: 1
          },
          // when window width is >= 480px
          480: {
            slidesPerView: 2
          },
          // when window width is >= 640px
          768: {
            slidesPerView: 3
          },
          // when window width is >= 1024px
          1024: {
            slidesPerView: 4
          },
        },
      });
    }
  });


  /*---------------------------------------------------------------------
    Data tables
  -----------------------------------------------------------------------*/
  if ($.fn.DataTable) {
    const dataTables = $('[data-toggle="data-table"]');
    if (dataTables.length) {
      dataTables.DataTable({
        "dom": '<"row align-items-center"<"col-md-6" l><"col-md-6" f>><"table-responsive border-bottom my-3" rt><"row align-items-center" <"col-md-6" i><"col-md-6" p>><"clear">',
      });
    }
  }

  /*---------------------------------------------------------------------
    Active Class for Pricing Table
  -----------------------------------------------------------------------*/
  const table = document.getElementById('my-table');
  if (table) {
    const tableTh = table.querySelectorAll('tr th');
    const tableTd = table.querySelectorAll('td');

    Array.from(tableTh, (elem) => {
      elem.addEventListener('click', () => {
        Array.from(tableTh, (th) => {
          if (th.children.length) {
            th.children[0].classList.remove('active');
          }
        });
        elem.children[0].classList.add('active');
        Array.from(tableTd, (td) => td.classList.remove('active'));

        const col = Array.prototype.indexOf.call(table.querySelector('tr').children, elem);
        const tdIcons = table.querySelectorAll("tr td:nth-child(" + parseInt(col + 1) + ")");
        Array.from(tdIcons, (td) => td.classList.add('active'));
      });
    });
  }

  /*---------------------------------------------------------------------
                AOS Animation Plugin
  -----------------------------------------------------------------------*/
  if (typeof AOS !== 'undefined') {
    AOS.init({
      startEvent: 'DOMContentLoaded',
      disable: function () {
        var maxWidth = 996;
        return window.innerWidth < maxWidth;
      },
      throttleDelay: 10,
      once: true,
      duration: 700,
      offset: 10
    });
    // Opcional: Para re-inicializar em cada navegação do Livewire
    AOS.refresh();
  }

  /*---------------------------------------------------------------------
                LoaderInit
  -----------------------------------------------------------------------*/
  const loaderInit = () => {
    const loader = document.querySelector('.loader');
    if (loader) {
      setTimeout(() => {
        loader.classList.add('animate__animated', 'animate__fadeOut');
        setTimeout(() => {
          loader.classList.add('d-none');
        }, 500);
      }, 500);
    }
  };
  loaderInit();

  /*---------------------------------------------------------------------
                Resize Plugins
  -----------------------------------------------------------------------*/
  // Esta função é reintroduzida para garantir o comportamento responsivo após a navegação.
  const resizePlugins = () => {
    const tabs = document.querySelectorAll('.nav');
    const sidebarResponsive = document.querySelector('.sidebar-default');
    if (window.innerWidth < 1025) {
      Array.from(tabs, (elem) => {
        if (!elem.classList.contains('flex-column') && elem.classList.contains('nav-tabs') && elem.classList.contains('nav-pills')) {
          elem.classList.add('flex-column', 'on-resize');
        }
      });
      if (sidebarResponsive) {
        if (!sidebarResponsive.classList.contains('sidebar-mini')) {
          sidebarResponsive.classList.add('sidebar-mini', 'on-resize');
        }
      }
    } else {
      Array.from(tabs, (elem) => {
        if (elem.classList.contains('on-resize')) {
          elem.classList.remove('flex-column', 'on-resize');
        }
      });
      if (sidebarResponsive) {
        if (sidebarResponsive.classList.contains('sidebar-mini') && sidebarResponsive.classList.contains('on-resize')) {
          sidebarResponsive.classList.remove('sidebar-mini', 'on-resize');
        }
      }
    }
  };
  resizePlugins(); // Chamada inicial ao carregar a página/navegar

  /*---------------------------------------------------------------------
                Sidebar Toggle
  -----------------------------------------------------------------------*/
  const sidebarToggleBtn = document.querySelectorAll('[data-toggle="sidebar"]');
  const sidebar = document.querySelector('.sidebar-default');

  const setupSidebar = () => {
    if (sidebar) {
      const sidebarActiveItem = sidebar.querySelectorAll('.active');
      Array.from(sidebarActiveItem, (elem) => {
        if (!elem.closest('ul').classList.contains('iq-main-menu')) {
          const childMenu = elem.closest('ul');
          childMenu.classList.add('show');
          const parentMenu = childMenu.closest('li').querySelector('.nav-link');
          parentMenu.classList.add('collapsed');
          parentMenu.setAttribute('aria-expanded', true);
        }
      });
    }
  };
  setupSidebar();

  Array.from(sidebarToggleBtn, (sidebarBtn) => {
    sidebarBtn.addEventListener('click', () => {
      const sidebar = document.querySelector('.sidebar');
      if (sidebar) {
        sidebar.classList.toggle('sidebar-mini');
      }
    });
  });

  /*---------------------------------------------------------------------------
                              Back To Top
  ----------------------------------------------------------------------------*/
  const backToTop = document.getElementById("back-to-top");
  if (backToTop) {
    backToTop.classList.add("animate__animated", "animate__fadeOut");
    window.addEventListener('scroll', () => {
      if (document.documentElement.scrollTop > 250) {
        backToTop.classList.remove("animate__fadeOut");
        backToTop.classList.add("animate__fadeIn");
      } else {
        backToTop.classList.remove("animate__fadeIn");
        backToTop.classList.add("animate__fadeOut");
      }
    });

    document.querySelector('#top').addEventListener('click', (e) => {
      e.preventDefault();
      window.scrollTo({ top: 0, behavior: 'smooth' });
    });
  }

  /*---------------------------------------------------------------------
  | | | | | DropDown
  -----------------------------------------------------------------------*/
  function darken_screen(yesno) {
    const screenDarken = document.querySelector('.screen-darken');
    if (!screenDarken) return;
    if (yesno) {
      screenDarken.classList.add('active');
    } else {
      screenDarken.classList.remove('active');
    }
  }

  function close_offcanvas() {
    darken_screen(false);
    const mobileOffcanvas = document.querySelector('.mobile-offcanvas.show');
    if (mobileOffcanvas) {
      mobileOffcanvas.classList.remove('show');
      document.body.classList.remove('offcanvas-active');
    }
  }

  function show_offcanvas(offcanvas_id) {
    darken_screen(true);
    const offcanvas = document.getElementById(offcanvas_id);
    if (offcanvas) {
      offcanvas.classList.add('show');
      document.body.classList.add('offcanvas-active');
    }
  }

  document.querySelectorAll('[data-trigger]').forEach(function (everyelement) {
    const offcanvas_id = everyelement.getAttribute('data-trigger');
    everyelement.addEventListener('click', function (e) {
      e.preventDefault();
      show_offcanvas(offcanvas_id);
    });
  });
  document.querySelectorAll('.btn-close').forEach(function (everybutton) {
    everybutton.addEventListener('click', close_offcanvas);
  });
  const screenDarken = document.querySelector('.screen-darken');
  if (screenDarken) {
    screenDarken.addEventListener('click', close_offcanvas);
  }

  const navbarSideCollapse = document.querySelector('#navbarSideCollapse');
  if (navbarSideCollapse) {
    navbarSideCollapse.addEventListener('click', () => {
      document.querySelector('.offcanvas-collapse').classList.toggle('open');
    });
  }

  /*---------------------------------------------------------------------
                                     Form Validation
  -----------------------------------------------------------------------*/
  document.querySelectorAll('.needs-validation').forEach(form => {
    form.addEventListener('submit', (event) => {
      if (!form.checkValidity()) {
        event.preventDefault();
        event.stopPropagation();
      }
      form.classList.add('was-validated');
    }, false);
  });

  /*----------------------------------------------------------
                               Flatpickr
  -------------------------------------------------------------*/
  if (typeof flatpickr !== 'undefined') {
    const flatpickrSelectors = [
      { selector: '.date_flatpicker', config: { minDate: "today", dateFormat: "Y-m-d" } },
      { selector: '.range_flatpicker', config: { mode: "range", minDate: "today", dateFormat: "Y-m-d" } },
      { selector: '.wrap_flatpickr', config: { wrap: true, minDate: "today", dateFormat: "Y-m-d" } },
      { selector: '.time_flatpickr', config: { enableTime: true, noCalendar: true, dateFormat: "H:i" } },
      { selector: '.inline_flatpickr', config: { inline: true, minDate: "today", dateFormat: "Y-m-d" } }
    ];

    flatpickrSelectors.forEach(item => {
      document.querySelectorAll(item.selector).forEach(elem => {
        flatpickr(elem, item.config);
      });
    });
  }
};

// Listener para o evento de navegação do Livewire
document.addEventListener('livewire:navigated', () => {
  initializeHopeUI();
});

// Listener para o evento inicial de carregamento da página
document.addEventListener('DOMContentLoaded', () => {
  initializeHopeUI();
});
