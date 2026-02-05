<!doctype html>
<html lang="en">
  <!--begin::Head-->
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>ServiceFlow Central | Dashboard</title>
    <!--begin::Accessibility Meta Tags-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes" />
    <meta name="color-scheme" content="light dark" />
    <meta name="theme-color" content="#007bff" media="(prefers-color-scheme: light)" />
    <meta name="theme-color" content="#1a1a1a" media="(prefers-color-scheme: dark)" />
    <!--end::Accessibility Meta Tags-->
    <!--begin::Primary Meta Tags-->
    <meta name="title" content="AdminLTE v4 | Dashboard" />
    <meta name="author" content="ColorlibHQ" />
    <meta
      name="description"
      content="AdminLTE is a Free Bootstrap 5 Admin Dashboard, 30 example pages using Vanilla JS. Fully accessible with WCAG 2.1 AA compliance."
    />
    <meta
      name="keywords"
      content="bootstrap 5, bootstrap, bootstrap 5 admin dashboard, bootstrap 5 dashboard, bootstrap 5 charts, bootstrap 5 calendar, bootstrap 5 datepicker, bootstrap 5 tables, bootstrap 5 datatable, vanilla js datatable, colorlibhq, colorlibhq dashboard, colorlibhq admin dashboard, accessible admin panel, WCAG compliant"
    />
    <!--end::Primary Meta Tags-->
    <!--begin::Accessibility Features-->
    <!-- Skip links will be dynamically added by accessibility.js -->
    <meta name="supported-color-schemes" content="light dark" />
    <link rel="preload" href="{{ asset('Adminassets/css/adminlte.css')}}" as="style" />
    <link rel="stylesheet" href="{{ asset('Adminassets/css/custom-neon.css')}}">
    <!--end::Accessibility Features-->
    <!--begin::Fonts-->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css"
      integrity="sha256-tXJfXfp6Ewt1ilPzLDtQnJV4hclT9XuaZUKyUvmyr+Q="
      crossorigin="anonymous"
      media="print"
      onload="this.media='all'"
    />
    <!--end::Fonts-->
    <!--begin::Third Party Plugin(OverlayScrollbars)-->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.11.0/styles/overlayscrollbars.min.css"
      crossorigin="anonymous"
    />
    <!--end::Third Party Plugin(OverlayScrollbars)-->
    <!--begin::Third Party Plugin(Bootstrap Icons)-->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css"
      crossorigin="anonymous"
    />
    <!--end::Third Party Plugin(Bootstrap Icons)-->
    <!--begin::Required Plugin(AdminLTE)-->
    <link rel="stylesheet" href="{{ asset('Adminassets/css/adminlte.css')}}" />
    <!--end::Required Plugin(AdminLTE)-->
    <!-- apexcharts -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/apexcharts@3.37.1/dist/apexcharts.css"
      integrity="sha256-4MX+61mt9NVvvuPjUWdUdyfZfxSB1/Rf9WtqRHgG5S0="
      crossorigin="anonymous"
    />
    <!-- jsvectormap -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/jsvectormap@1.5.3/dist/css/jsvectormap.min.css"
      integrity="sha256-+uGLJmmTKOqBr+2E6KDYs/NRsHxSkONXFHUL0fy2O/4="
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.min.css">
  </head>
  <style>
    /* Input box ke andar likha hua text white karne ke liye */
    .form-control, .form-select {
        color: #ffffff !important; /* Likha hua text white ho jayega */
        background-color: rgba(255, 255, 255, 0.05) !important; /* Halka sa dark background */
        border: 1px solid #444 !important; /* Border ka color */
    }

    /* Jab aap box ke andar click karke type karenge (Focus mode) */
    .form-control:focus, .form-select:focus {
        color: #ffffff !important;
        background-color: rgba(255, 255, 255, 0.1) !important;
        border-color: #007bff !important; /* Blue border chamkega */
        box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
    }

    /* Placeholder ka color (jo halka sa "Ali" likha hota hai) */
    .form-control::placeholder {
        color: #bbbbbb !important;
    }
    /* 1. Normal halat mein Select Box */
    select.form-select {
        background-color: #0d1117 !important; /* Dark Blue-Black */
        color: #00d4ff !important;           /* Neon Blue Text */
        border: 1px solid #007bff !important; /* Blue Border */
    }

    /* 2. Jab dropdown open ho (Options list) */
    select.form-select option {
        background-color: #0d1117 !important; /* Background dark rakhen */
        color: #ffffff !important;           /* Cities ka naam White ho jaye */
        padding: 10px !important;
    }

    /* 3. Mouse le jane par ya select karne par highlight */
    select.form-select:focus {
        border-color: #00d4ff !important;
        box-shadow: 0 0 10px rgba(0, 212, 255, 0.5) !important;
        color: #00d4ff !important;
    }

    /* Taake dropdown khulte hi "Ali" ya Cities black na dikhein */
    .form-select:active, .form-select:hover {
        background-color: #1a1a1a !important;
    }
</style>
  <!--end::Head-->
  <!--begin::Body-->
  <body class="layout-fixed sidebar-expand-lg sidebar-open bg-body-tertiary">
    <style>
      /* Poore page ko Navy Blue karne ke liye */
body, .app-wrapper {
    background-color: #0f172a !important; /* Sidebar jaisa Navy Blue */
    color: white;
}

/* Jo section white dikh raha hai usse override karein */
.bg-body-tertiary {
    background-color: #0f172a !important;
}

/* Main Content Area */
.app-main {
    background-color: #0f172a !important;
}

/* Header/Navbar agar white hai toh usse bhi fix karein */
.app-header {
    background-color: #1e293b !important;
    border-bottom: 1px solid rgba(255,255,255,0.1) !important;
    color: white !important;
}

/* Dashboard title area fix */
.app-content-header {
    background-color: #0f172a !important;
}
/* Direct targeting Home and Contact links */
.nav-item .nav-link {
    color: #ffffff !important; /* Text white karne ke liye */
    font-weight: 500;
    transition: 0.3s;
}

/* Hover effect taaki judge ko pata chale mouse upar hai */
.nav-item .nav-link:hover {
    color: #0dcaf0 !important; /* Hover par light blue */
}

/* Navbar ka background bhi dark navy blue */
.app-header.navbar {
    background-color: #1e293b !important;
    border-bottom: 1px solid rgba(255,255,255,0.1);
}

/* Burger menu (Sidebar toggle) button ko bhi white kar dega */
.nav-link i, .navbar-toggler-icon {
    color: #ffffff !important;
}

    </style>
    <!--begin::App Wrapper-->
    <div class="app-wrapper">
      <!--begin::Header-->
      <nav class="app-header navbar navbar-expand bg-body-tertiary">
        <!--begin::Container-->
        <div class="container-fluid">
          <!--begin::Start Navbar Links-->
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" data-lte-toggle="sidebar" href="#" role="button">
                <i class="bi bi-list"></i>
              </a>
            </li>
            <li class="nav-item d-none d-md-block">
                <a href="#" class="nav-link">Home</a>
            </li>
            <li class="nav-item d-none d-md-block">
                <a href="#" class="nav-link">Contact</a>
            </li>
          </ul>
          <!--end::Start Navbar Links-->
          <!--begin::End Navbar Links-->
          <ul class="navbar-nav ms-auto">
            <!--begin::Navbar Search-->
            <li class="nav-item">
              <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                <i class="bi bi-search"></i>
              </a>
            </li>
            <!--end::Navbar Search-->
            <!--begin::Messages Dropdown Menu-->
           
            <!--end::Notifications Dropdown Menu-->
            <!--begin::Fullscreen Toggle-->
            <li class="nav-item">
              <a class="nav-link" href="#" data-lte-toggle="fullscreen">
                <i data-lte-icon="maximize" class="bi bi-arrows-fullscreen"></i>
                <i data-lte-icon="minimize" class="bi bi-fullscreen-exit" style="display: none"></i>
              </a>
            </li>
            <!--end::Fullscreen Toggle-->
            <!--begin::User Menu Dropdown-->
            <li class="nav-item dropdown user-menu">
              <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
             
                <span class="d-none d-md-inline">Admin</span>
              </a>
              <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
                <!--begin::User Image-->
                <li class="user-header text-bg-primary">
                 <img
  src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png"
  class="rounded-circle shadow"
  style="width: 160px; height: 160px; object-fit: cover; border: 3px solid #00d4ff;"
  alt="System Admin"
/>
                  <p>
                    Admin - Web Developer
                    <small>Lead Developer | 2025</small>
                  </p>
                </li>
                <!--end::User Image-->
                <!--begin::Menu Body-->
                <li class="user-body">
                  <!--begin::Row-->
                  <div class="row">
                  
                  </div>
                  <!--end::Row-->
                </li>
                <!--end::Menu Body-->
                <!--begin::Menu Footer-->
                <li class="user-footer">
             <a href="#" class="btn btn-default btn-flat">Profile</a>
      <a href="{{ route('user.logout') }}" class="btn btn-default btn-flat float-end">Sign out</a>
                </li>
                <!--end::Menu Footer-->
              </ul>
            </li>
            <!--end::User Menu Dropdown-->
          </ul>
          <!--end::End Navbar Links-->
        </div>
        <!--end::Container-->
      </nav>
      <!--end::Header-->
      <!--begin::Sidebar-->
      <aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
        <!--begin::Sidebar Brand-->
        <div class="sidebar-brand">
          <!--begin::Brand Link-->
          <a href="{{ asset('Adminassets/index.html')}}" class="brand-link">
            <!--begin::Brand Image-->
           
            <!--end::Brand Image-->
            <!--begin::Brand Text-->
            <span class="brand-text fw-light">ServiceFlow Admin</span>
            <!--end::Brand Text-->
          </a>
          <!--end::Brand Link-->
        </div>
        <!--end::Sidebar Brand-->
        <!--begin::Sidebar Wrapper-->
        <div class="sidebar-wrapper">
          <nav class="mt-2">
            <!--begin::Sidebar Menu-->
            <ul
              class="nav sidebar-menu flex-column"
              data-lte-toggle="treeview"
              role="navigation"
              aria-label="Main navigation"
              data-accordion="false"
              id="navigation"
            >
              <li class="nav-item menu-open">
                <a href="#" class="nav-link active">
                  <i class="nav-icon bi bi-speedometer"></i>
                  <p>
                    ServiceFlow Admin
                    <i class="nav-arrow bi bi-chevron-right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
    <a href="{{ route('admin.dashboard') }}" class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}">
        <i class="nav-icon bi bi-circle"></i>
        <p>ServiceFlow Central</p>
    </a>
</li>

              <li class="nav-item">
          <a href="#" class="nav-link">
          <i class="nav-icon bi bi-box-seam-fill"></i>
           <p>
            Manage Courier
            <i class="nav-arrow bi bi-chevron-right"></i>
           </p>
              </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ route('courier.create') }}" class="nav-link">
                <i class="nav-icon bi bi-plus-circle"></i>
                <p>New Courier</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('courier.index') }}" class="nav-link">
                <i class="nav-icon bi bi-circle"></i>
                <p>View All Details</p>
            </a>
        </li>
    </ul>
</li> <li class="nav-item">
    <a href="#" class="nav-link">
        <i class="nav-icon bi bi-people-fill"></i>
        <p>
            Manage Agents
            <i class="nav-arrow bi bi-chevron-right"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ route('agent.create') }}" class="nav-link">
                <i class="nav-icon bi bi-plus-circle"></i>
                <p>Add New Agent</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('agent.index') }}" class="nav-link">
                <i class="nav-icon bi bi-list-ul"></i>
                <p>View All Agents</p>
            </a>
        </li>
    </ul>
</li>
           

  <li class="nav-item">
    <a href="{{ route('customer.index') }}" class="nav-link">
      <i class="nav-icon bi bi-person-vcard"></i>
      <p>Manage Customers</p>
    </a>
  </li>

        


<li class="nav-item">
    <a href="{{ route('user.login') }}" class="nav-link">
        <i class="nav-icon bi bi-box-arrow-in-right"></i>
        <p>Login Page</p>
    </a>
</li>


    <a href="{{ route('home') }}" class="nav-link">
        <i class="nav-icon bi bi-globe"></i> <p>View Website</p>
    </a>
</li>
              
             
    
             
              
            <!--end::Sidebar Menu-->
          </nav>
        </div>
        <!--end::Sidebar Wrapper-->
      </aside>
      <!--end::Sidebar-->
      <!--begin::App Main-->
      <main class="app-main">
            
        <!--begin::App Content Header-->
        <div class="app-content-header">
          <!--begin::Container-->
          <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
              <div class="col-sm-6"><h3 class="mb-0">Dashboard</h3></div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                
                  
                </ol>
              </div>
            </div>
            <!--end::Row-->
          </div>
          <!--end::Container-->
        </div>
         @yield('main')
    
      <footer class="app-footer shadow-sm">
    <div class="container-fluid">
        <div class="row align-items-center py-3">
            <div class="col-md-6 text-center text-md-start">
                <span class="text-secondary" style="font-size: 0.9rem;">
                    <strong>Copyright &copy; {{ date('Y') }}</strong> 
                    <a href="#" class="text-primary fw-bold text-decoration-none ms-1">ServiceFlow Admin</a>.
                    <span class="ms-2 d-none d-sm-inline-block text-muted">| All rights reserved.</span>
                </span>
            </div>

            <div class="col-md-6 text-center text-md-end mt-2 mt-md-0">
                <div class="d-inline-flex align-items-center gap-2">
                    <span class="badge bg-light text-dark border fw-normal">v1.0.4</span>
                    <span class="text-secondary d-none d-sm-inline" style="font-size: 0.85rem;">
                        Reliable Logistics Solutions
                    </span>
                </div>
            </div>
        </div>
    </div>
</footer>

<style>
    /* Professional Footer Styling */
    .app-footer {
        background: #000000 !important;
        border-top: 1px solid #e9ecef !important;
        padding: 0 !important; /* Row ki padding use ho rahi hai */
        margin-top: 50px; /* Page content se fasla */
    }

    .app-footer a:hover {
        color: #1e3c72 !important;
        text-decoration: underline !important;
    }
    
    /* Sticky bottom fix agar content kam ho */
    body {
        display: flex;
        flex-direction: column;
        min-height: 100vh;
    }
    .content-wrapper {
        flex: 1;
    }
</style>
      <!--end::Footer-->
    </div>
    <!--end::App Wrapper-->
    <!--begin::Script-->
    <!--begin::Third Party Plugin(OverlayScrollbars)-->
    <script
      src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.11.0/browser/overlayscrollbars.browser.es6.min.js"
      crossorigin="anonymous"
    ></script>
    <!--end::Third Party Plugin(OverlayScrollbars)--><!--begin::Required Plugin(popperjs for Bootstrap 5)-->
    <script
      src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
      crossorigin="anonymous"
    ></script>
    <!--end::Required Plugin(popperjs for Bootstrap 5)--><!--begin::Required Plugin(Bootstrap 5)-->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.min.js"
      crossorigin="anonymous"
    ></script>
    <!--end::Required Plugin(Bootstrap 5)--><!--begin::Required Plugin(AdminLTE)-->
    <script src="{{ asset('Adminassets/js/adminlte.js')}}"></script>
    <!--end::Required Plugin(AdminLTE)--><!--begin::OverlayScrollbars Configure-->
    <script>
      const SELECTOR_SIDEBAR_WRAPPER = '.sidebar-wrapper';
      const Default = {
        scrollbarTheme: 'os-theme-dark',
        scrollbarAutoHide: 'leave',
        scrollbarClickScroll: true,
      };
      document.addEventListener('DOMContentLoaded', function () {
        const sidebarWrapper = document.querySelector(SELECTOR_SIDEBAR_WRAPPER);
        if (sidebarWrapper && OverlayScrollbarsGlobal?.OverlayScrollbars !== undefined) {
          OverlayScrollbarsGlobal.OverlayScrollbars(sidebarWrapper, {
            scrollbars: {
              theme: Default.scrollbarTheme,
              autoHide: Default.scrollbarAutoHide,
              clickScroll: Default.scrollbarClickScroll,
            },
          });
        }
      });
    </script>
    <!--end::OverlayScrollbars Configure-->
    <!-- OPTIONAL SCRIPTS -->
    <!-- sortablejs -->
    <script
      src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.0/Sortable.min.js"
      crossorigin="anonymous"
    ></script>
    <!-- sortablejs -->
    <script>
      new Sortable(document.querySelector('.connectedSortable'), {
        group: 'shared',
        handle: '.card-header',
      });

      const cardHeaders = document.querySelectorAll('.connectedSortable .card-header');
      cardHeaders.forEach((cardHeader) => {
        cardHeader.style.cursor = 'move';
      });
    </script>
    <!-- apexcharts -->
    <script
      src="https://cdn.jsdelivr.net/npm/apexcharts@3.37.1/dist/apexcharts.min.js"
      integrity="sha256-+vh8GkaU7C9/wbSLIcwq82tQ2wTf44aOHA8HlBMwRI8="
      crossorigin="anonymous"
    ></script>
    <!-- ChartJS -->
    <script>
      // NOTICE!! DO NOT USE ANY OF THIS JAVASCRIPT
      // IT'S ALL JUST JUNK FOR DEMO
      // ++++++++++++++++++++++++++++++++++++++++++

       const sales_chart_options = {
  series: [
    {
      name: 'Completed Services', // 'Digital Goods' ki jagah
      data: [28, 48, 40, 19, 86, 27, 90], // Apni marzi ka data dalen
    },
    {
      name: 'Pending Requests', // 'Electronics' ki jagah
      data: [65, 59, 80, 81, 56, 55, 40],
    },
  
        ],
        chart: {
          height: 300,
          type: 'area',
          toolbar: {
            show: false,
          },
        },
        legend: {
          show: false,
        },
        colors: ['#0d6efd', '#20c997'],
        dataLabels: {
          enabled: false,
        },
        stroke: {
          curve: 'smooth',
        },
        xaxis: {
          type: 'datetime',
          categories: [
            '2023-01-01',
            '2023-02-01',
            '2023-03-01',
            '2023-04-01',
            '2023-05-01',
            '2023-06-01',
            '2023-07-01',
          ],
        },
        tooltip: {
          x: {
            format: 'MMMM yyyy',
          },
        },
      };

      const sales_chart = new ApexCharts(
        document.querySelector('#revenue-chart'),
        sales_chart_options,
      );
      sales_chart.render();
    </script>
    <!-- jsvectormap -->
    <script
      src="https://cdn.jsdelivr.net/npm/jsvectormap@1.5.3/dist/js/jsvectormap.min.js"
      integrity="sha256-/t1nN2956BT869E6H4V1dnt0X5pAQHPytli+1nTZm2Y="
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/jsvectormap@1.5.3/dist/maps/world.js"
      integrity="sha256-XPpPaZlU8S/HWf7FZLAncLg2SAkP8ScUTII89x9D3lY="
      crossorigin="anonymous"
    ></script>
    <!-- jsvectormap -->
    <script>
      // World map by jsVectorMap
      new jsVectorMap({
        selector: '#world-map',
        map: 'world',
      });

      // Sparkline charts
      const option_sparkline1 = {
        series: [
          {
            data: [1000, 1200, 920, 927, 931, 1027, 819, 930, 1021],
          },
        ],
        chart: {
          type: 'area',
          height: 50,
          sparkline: {
            enabled: true,
          },
        },
        stroke: {
          curve: 'straight',
        },
        fill: {
          opacity: 0.3,
        },
        yaxis: {
          min: 0,
        },
        colors: ['#DCE6EC'],
      };

      const sparkline1 = new ApexCharts(document.querySelector('#sparkline-1'), option_sparkline1);
      sparkline1.render();

      const option_sparkline2 = {
        series: [
          {
            data: [515, 519, 520, 522, 652, 810, 370, 627, 319, 630, 921],
          },
        ],
        chart: {
          type: 'area',
          height: 50,
          sparkline: {
            enabled: true,
          },
        },
        stroke: {
          curve: 'straight',
        },
        fill: {
          opacity: 0.3,
        },
        yaxis: {
          min: 0,
        },
        colors: ['#0d6efd', '#20c997'], // Blue aur Green
      };

      const sparkline2 = new ApexCharts(document.querySelector('#sparkline-2'), option_sparkline2);
      sparkline2.render();

      const option_sparkline3 = {
        series: [
          {
            data: [15, 19, 20, 22, 33, 27, 31, 27, 19, 30, 21],
          },
        ],
        chart: {
          type: 'area',
          height: 50,
          sparkline: {
            enabled: true,
          },
        },
        stroke: {
          curve: 'straight',
        },
        fill: {
          opacity: 0.3,
        },
        yaxis: {
          min: 0,
        },
        colors: ['#0d6efd', '#20c997'], // Blue aur Green
      };

      const sparkline3 = new ApexCharts(document.querySelector('#sparkline-3'), option_sparkline3);
      sparkline3.render();
    </script>
    <!--end::Script-->
  </body>
  <!--end::Body-->
</html>
