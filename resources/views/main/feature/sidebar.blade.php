<style>
    .flex-column {
        -webkit-box-orient: vertical!important;
        -webkit-box-direction: normal!important;
        -webkit-flex-direction: column!important;
        -ms-flex-direction: column!important;
        flex-direction: column!important;
    }
    .nab {
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        padding-left: 0;
        margin-bottom: 0;
        list-style: none;
    }
    .nav-l {
        display: block;
        padding: 0.5em 1em;
        font-size: 15px;
    }
    .nab .active {
        font-weight: bold;
    }
</style>
<nav class="nab flex-column">
    <a class="nav-l active" href="#">Terms of Service</a>
    <a class="nav-l" href="#">Privacy Policy</a>
</nav>