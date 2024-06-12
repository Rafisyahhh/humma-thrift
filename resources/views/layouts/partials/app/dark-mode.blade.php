<!-- Theme Mode -->
<li class="nav-item dropdown-theme-mode dropdown me-2 me-xl-0">
    <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);"
        data-bs-toggle="dropdown">
        <i class="ti ti-moon rounded-circle ti-md"></i>
    </a>
    <ul class="dropdown-menu dropdown-menu-end">
        <li><h6 class="dropdown-header">Tema Situs</h6></li>
        <li>
            <a class="dropdown-item" href="javascript:void(0);" data-theme="light">
                <span class="align-middle">Terang</span>
            </a>
        </li>
        <li>
            <a class="dropdown-item" href="javascript:void(0);" data-theme="dark">
                <span class="align-middle">Gelap</span>
            </a>
        </li>
        <li>
            <a class="dropdown-item" href="javascript:void(0);" data-theme="system">
                <span class="align-middle">Menurut Sistem</span>
            </a>
        </li>
    </ul>
</li>
<!--/ Theme Mode -->

@push('js')
<script>
    function setTheme(theme) {
        const coreStylesheet = document.getElementById('stylesheet-core');
        const themeStylesheet = document.getElementById('stylesheet-theme');

        if (theme === 'light') {
            coreStylesheet.setAttribute('href', 'template-assets/admin/assets/vendor/css/rtl/core.css');
            themeStylesheet.setAttribute('href', 'template-assets/admin/assets/vendor/css/rtl/theme-bordered.css');
            localStorage.setItem('theme', 'light');
        } else if (theme === 'dark') {
            coreStylesheet.setAttribute('href', 'template-assets/admin/assets/vendor/css/rtl/core-dark.css');
            themeStylesheet.setAttribute('href', 'template-assets/admin/assets/vendor/css/rtl/theme-bordered-dark.css');
            localStorage.setItem('theme', 'dark');
        } else if (theme === 'system') {
            // For system theme, you can add logic to match the system preference
            const prefersDarkScheme = window.matchMedia("(prefers-color-scheme: dark)").matches;
            if (prefersDarkScheme) {
                coreStylesheet.setAttribute('href', 'template-assets/admin/assets/vendor/css/rtl/core-dark.css');
                themeStylesheet.setAttribute('href', 'template-assets/admin/assets/vendor/css/rtl/theme-bordered-dark.css');
            } else {
                coreStylesheet.setAttribute('href', 'template-assets/admin/assets/vendor/css/rtl/core.css');
                themeStylesheet.setAttribute('href', 'template-assets/admin/assets/vendor/css/rtl/theme-bordered.css');
            }
            localStorage.removeItem('theme');
        }
    }

    document.querySelectorAll('.dropdown-item').forEach(item => {
        item.addEventListener('click', function() {
            const theme = this.getAttribute('data-theme');
            setTheme(theme);
        });
    });

    // Apply the saved theme on page load
    document.addEventListener('DOMContentLoaded', (event) => {
        const savedTheme = localStorage.getItem('theme');
        if (savedTheme) {
            setTheme(savedTheme);
        } else {
            // Apply system preference on initial load
            const prefersDarkScheme = window.matchMedia("(prefers-color-scheme: dark)").matches;
            if (prefersDarkScheme) {
                setTheme('dark');
            } else {
                setTheme('light');
            }
        }
    });
</script>
@endpush
