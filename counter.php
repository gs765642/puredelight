
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Toggle Menu</title>
    <style>
        .sub-menu {
            display: none;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <ul class="main-menu">
            <li class="menu-has-children">
                <a href="#">Main Item 1</a>
                <ul class="sub-menu">
                    <li>1 item</li>
                    <li>2 item</li>
                    <li>3 item</li>
                    <li>4 item</li>
                    <li>5 item</li>
                    <li>6 item</li>
                </ul>
            </li>
            <li class="menu-has-children">
                <a href="#">Main Item 2</a>
                <ul class="sub-menu">
                    <li>1 item</li>
                    <li>2 item</li>
                    <li>3 item</li>
                    <li>4 item</li>
                    <li>5 item</li>
                    <li>6 item</li>
                </ul>
            </li>
            <li>
                <a href="#">Main Item 3</a>
            </li>
        </ul>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            $('.menu-has-children > a').click(function (e) {
                e.preventDefault();
                var subMenu = $(this).next('.sub-menu');

                $('.sub-menu').not(subMenu).slideUp();
                subMenu.slideToggle();
            });
        });

    </script>
</body>

</html>