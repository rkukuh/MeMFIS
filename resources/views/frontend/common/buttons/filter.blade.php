<button class="btn m-btn--pill m-btn--air btn-outline-info btn-sm btn-filter">
    Advance Filter
</button>

<script>
$('.btn-filter').on('click', function () {
    $('.advanceFilter').slideToggle('slow', function () {
        $('#advanceFilter').removeClass('hidden');
    });
});
</script>