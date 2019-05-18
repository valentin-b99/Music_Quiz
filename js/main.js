$(function() {
	$("#submit-button").click(function(e){
        e.preventDefault();

		$.post(
			'request/next_answer.php',
			{
			    answer : $("input[name='answers']:checked").val()
			},
		
			function(data){
				if (data == 'success') {
					$("#submit-button").prop("disabled", true);
					set_right_ans_visible();
					$("#submit-button").text("Next question (5)");
					setTimeout(function(){
						$("#submit-button").text("Next question (4)");
					}, 1000);
					setTimeout(function(){
						$("#submit-button").text("Next question (3)");
					}, 2000);
					setTimeout(function(){
						$("#submit-button").text("Next question (2)");
					}, 3000);
					setTimeout(function(){
						$("#submit-button").text("Next question (1)");
					}, 4000);
					setTimeout(function(){
						location.reload();
					}, 5000);
				} else {
					$("#error-modal-msg").text(data);
					$("#error-modal").modal("show");
				}
			}
		);
    });
    
    $("#retry-button").click(function(e){
        e.preventDefault();

		$.post(
			'request/retry.php',
		
			function(data){
				if (data == 'success') {
					location.reload();
				}
			}
		);
	});
});