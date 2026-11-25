<style>
    #page,
    .wsmenucontainer {
        overflow: clip !important;
    }

    @layer base {

        html,
        body {
            margin: 0;
            padding: 0;
        }

        body {
            overscroll-behavior: none;
        }

        main> :first-child {
            margin-top: 0 !important;
        }

        main> :last-child {
            margin-bottom: 0 !important;
        }
    }

    ::-webkit-scrollbar {
        display: none;
    }

    .sticky-box {
        position: sticky;
        z-index: 20;
        color: #ffffff;
    }
</style>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&amp;display=swap"
    rel="stylesheet" />
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
    rel="stylesheet" />
