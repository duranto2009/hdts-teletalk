$(document).ready(function () {
    $(".div").change(function () {
        var val = $(this).val();
        if (val == "Barisal Division") {
            $(".dis").html("<option>Select</option><option value='Barisal'>Barisal</option><option value='Barguna'>Barguna</option><option value='Bhola'>Bhola</option><option value='Jhalokathi'>Jhalokathi</option><option value='Patuakhali'>Patuakhali</option><option value='Pirojpur'>Pirojpur</option>");
        } else if (val == "Chittagong Division") {
            $(".dis").html("<option>Select</option><option value='Bandorban'>Bandorban</option><option value='Brahmanbaria'>Brahmanbaria</option><option value='Chandpur'>Chandpur</option><option value='Chittagong'>Chittagong</option><option value='Comilla'>Comilla</option><option value='Coxs Bazar'>Coxs Bazar</option><option value='Brahmanbaria'>Brahmanbaria</option><option value='Feni'>Feni</option><option value='Khagrachhari'>Khagrachhari</option><option value='Laksmipur'>Lakshmipur</option><option value='Noakhali'>Noakhali</option><option value='Rangamati'>Rangamati</option>");
        } else if (val == "Dhaka Division") {
            $(".dis").html("<option>Select</option><option value='Dhaka'>Dhaka</option><option value='Faridpur'>Faridpur</option><option value='Gazipur'>Gazipur</option><option value='Gopalganj'>Gopalganj</option><option value='Kishoreganj'>Kishoreganj</option><option value='Madaripur'>Madaripur</option><option value='Manikganj'>Manikganj</option><option value='Munshiganj'>Munshiganj</option><option value='Narayanganj'>Narayanganj</option><option value='Norshingdi'>Norshingdi</option><option value='Rajbari'>Rajbari</option><option value='Shariatpur'>Shariatpur</option><option value='Tangail'>Tangail</option>");
        } else if (val == "Khulna Division") {
            $(".dis").html("<option>Select</option><option value='Bagerhat'>Bagerhat</option><option value='Chuadanga'>Chuadanga</option><option value='Jessore'>Jessore</option><option value='Jhinaidaha'>Jhinaidaha</option><option value='Khulna'>Khulna</option><option value='Kushtia'>Kushtia</option><option value='Magura'>Magura</option><option value='Meherpur'>Meherpur</option><option value='Narail'>Narail</option><option value='Satkhira'>Satkhira</option>");
        } else if (val == "Mymensingh Division") {
            $(".dis").html("<option>Select</option><option value='Jamalpur'>Jamalpur</option><option value='Mymensingh'>Mymensingh</option><option value='Netrokona'>Netrokona</option><option value='Sherpur'>Sherpur</option>");
        } else if (val == "Rajshai Division") {
            $(".dis").html("<option>Select</option><option value='Bogra'>Bogra</option><option value='Jaypurhat'>Joypurhat</option><option value='Naogaon'>Naogaon</option><option value='Natore'>Natore</option><option value='Chapainawabganj'>Chapainawabganj</option><option value='Pabna'>Pabna</option><option value='Rajshahi'>Rajshahi</option><option value='Shirajganj'>Shirajganj</option>");
        } else if (val == "Rangpur Division") {
            $(".dis").html("<option>Select</option><option value='Dinajpur'>Dinajpur</option><option value='Gaibandha'>Gaibandha</option><option value='Kurigram'>Kurigram</option><option value='Lalmonirhat'>Lalmonirhat</option><option value='Nilphamary'>Nilphamary</option><option value='Panchagarh'>Panchagarh</option><option value='Rangpur'>Rangpur</option><option value='Thakurgaon'>Thakurgaon</option>");
        } else if (val == "Sylhet Division") {
            $(".dis").html("<option>Select</option><option value='Habiganj'>Habiganj</option><option value='Moulovibazar'>Moulovibazar</option><option value='Sunamganj'>Sunamganj</option><option value='Sylhet'>Sylhet</option>");
        }
		
    });
});