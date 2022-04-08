let deegreeList = [90, 270, 180, 360, 225, 45, 315, 135]
	
$.ajax({
    type: "GET",
    dataType: "json",
    url: "api/api_rewards.php",
    success: function (response){

        for(let i=0; i<response.length; i++){

            index = i+1

            if(index >= 5){
                index=index-4
                document.getElementById("box2").innerHTML += '<span class="span'+index+' bg_polygon_2"><b>' +response[i].name+ '</b></span>'
            } else {
                document.getElementById("box1").innerHTML += '<span class="span'+index+' bg_polygon"><b>' +response[i].name+ '</b></span>'
            }

        }
    }
})

$('input').blur(function () {                     
        $(this).val(
            $.trim($(this).val())
        );
});

$("#rule").click(function() {
    $("#h_rule").removeClass("d-none");
    $("#h_rule").addClass("d-block");
});

$("#h_rule").click(function() {
    $("#h_rule").removeClass("d-block");
    $("#h_rule").addClass("d-none");
});

$(document).ready(function() {
    $('#btn_spin').prop('disabled', true);
});

// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

var btn_redeem = document.getElementById("sub_redeem");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

var code_id = "";


if (code_id == "") {
    modal.style.display = "block";
}

btn_redeem.onclick = function() {

    var str_redeem = document.getElementById("str_code_name").value;

    //console.log(str_redeem);

    if (str_redeem == "") {
        swal('Message', 'กรุณากรอก Code เพื่อหมุนวงล้อ', 'error');
    } 
    else {

        $.ajax({
            type: "POST",
            url: 'api/api_coupon_checked.php',
            data: "str_redeem=" + str_redeem,
            success: function(data) {

                if (data != 400 && data != 300) {

                    modal.style.display = "none";

                    $('#code_ck').val(data);
                    $('#code_up').val(str_redeem);
                    $('#btn_spin').prop('disabled', false);

                } else if (data == 400 || data == 300) {

                    swal('Message', 'ไม่สามารถใช้ Code นี้ได้ กรุณาลองใหม่อีกครั้ง', 'error');

                }
            }
        });

    }
}

// When the user clicks the button, open the modal 
btn.onclick = function() {
    modal.style.display = "block";
}

var arr = [0, 45, 90, 135, 180, 225, 270, 315];
var current_deg = 0;

function getDegree() {
    if (arr.length <= 0) {
        return -1;
    }
    var i = Math.round(Math.random() * 1000) % arr.length;
    var deg = Math.round(Math.random() * 100) * 360 + arr[i];
    arr.splice(i, 1);
    return deg;
}

const wheel = document.getElementById('box');
const startButton = document.getElementById('btn_spin');
let deg = 360;

function spin_2() {

    //console.log('startButton');
    // Disable button during spin
    startButton.style.pointerEvents = 'none';
    // Calculate a new rotation between 5000 and 10 000
    deg = Math.floor(5000 + Math.random() * 5000);
    // Set the transition on the wheel
    wheel.style.transition = 'all 9s ease-out';
    // Rotate the wheel
    wheel.style.transform = `rotateZ(${deg}deg)`;
    // Apply the blur
    wheel.classList.add('blur');
}

function spin_3() {

    let degree = document.getElementById("code_ck").value;

    //console.log(degree);

    // Enable button when spin is over
    startButton.style.pointerEvents = 'none';
    // Need to set transition to none as we want to rotate instantly
    wheel.style.transition = 'all 8s ease-out';
    // Calculate degree on a 360 degree basis to get the "natural" real rotation
    // Important because we want to start the next spin from that one
    // Use modulus to get the rest value from 360
    const actualDeg = degree * 360;
    // Set the real rotation instantly without animation
    wheel.style.transform = `rotateZ(${degree}deg)`;
}

function click_spin() {
    
    //console.log('click spin');

    setTimeout(function() {

        startButton.addEventListener('click', spin_2(), false);

    }, 1);

    setTimeout(function() {

        wheel.addEventListener('transitionend', spin_3(), false);
    }, 3000);

    var element = document.getElementById('mainbox');
    element.classList.remove('animate');

    setTimeout(function() {
        element.classList.add('animate');
        document.getElementById('box').style.animation = "";

    }, 11500); //5000 = 5 second


    setTimeout(function() {

        var str_redeem = document.getElementById("str_code_name").value;

        // Remove blur
        wheel.classList.remove('blur');

        $.ajax({
            type: "POST",
            url: 'api/api_coupon_use.php',
            data: "str_redeem=" + str_redeem + "&code_ck=" + document.getElementById("code_ck").value,
            success: function(data) {
                //console.log(data);
                swal('รางวัลที่ได้', data, 'success')

                if(data.includes('Free') || data.includes('ใหม่')){
                    $('#code_ck').val();
                    $('#code_up').val();
                    setTimeout(location.reload.bind(location), 4000);
                }
                else {
                    document.getElementById("btn_spin").style.display = "none"
                    document.getElementById("btn-reset").style.display = "block"
                }
            }
        });

    }, 12000);
}