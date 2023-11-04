<footer class="footer pt-5">
    <div class="container-fluid">
        <div class="row align-items-center justify-content-lg-between">
                    <div class="col-lg-12">
                    <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                    <li class="nav-item">
                        <a href="#" class="nav-link pe-0 text-muted" target="_blank">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link pe-0 text-muted" target="_blank">Rooms</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link pe-0 text-muted" target="_blank">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link pe-0 text-muted" target="_blank">Services</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link pe-0 text-muted" target="_blank">Contact</a>
                    </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
</main>

    <script src="assets/js/jquery-3.7.1.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/perfect-scrollbar.min.js"></script>
    <script src="assets/js/smooth-scrollbar.min.js"></script>

    <script src="assets/js/custom.js"></script>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>"

    <!--    Alertify     -->
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

    <script>

        <?php if(isset($_SESSION['message'])) 
        { 
            ?>
            alertify.set('notifier','position', 'top-right');
            alertify.success('<?= $_SESSION['message']; ?>');
            <?php 
            unset($_SESSION['message']);
        } 
        ?>
    </script>
    <script>
    // Add a click event handler for the "Ban" buttons
    const banButtons = document.querySelectorAll('.ban_users_btn');
    banButtons.forEach(button => {
        button.addEventListener('click', () => {
            if (button.innerText === 'Ban') {
                button.innerText = 'Unban';
                // You can add code here to perform the banning action.
            } else {
                button.innerText = 'Ban';
                // You can add code here to perform the unbanning action.
            }
        });
    });
    </script>
</body>
</html>
