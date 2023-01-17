$(document).ready(function () {
    $('[data-action="duplicate-row"]').click(function () {
        const insertTarget = $(this).attr("data-insert-target");
        const target = $(this).attr("data-target");
        $(insertTarget).append($(target).html());
    });

    $('[data-action="remove-row"]').click(function () {
        const removeTarget = $(this).attr("data-remove-target");
        const container = $(this).attr("data-container-target");
        console.log("ddddddddd", $(`${removeTarget} ${container}`).length);
        if ($(`${removeTarget} ${container}`).length > 1) {
            $(`${removeTarget} ${container}:last-of-type`).remove();
        }
    });

    // $(document).on("change", '[name="item_name"]', function () {
    // 	const value = $(this).val();
    // 	const parent = $(this).parent(".row");
    // 	if (value.length > 1) {
    // 		$(parent).find(".conditional_required").attr("required", "required");
    // 	} else {
    // 		$(parent).find(".conditional_required").removeAttr("required");
    // 	}
    // });
});
