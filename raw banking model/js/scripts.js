$(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();

            $('#mycarousel').carousel({interval:3000});
            $('#carouselButton').click(function(){
                if($('#carouselButton').children('span').hasClass('fa-pause')){
                    $('#mycarousel').carousel('pause');
                    
                    $('#carouselButton').children('span').removeClass('fa-pause');
                    $('#carouselButton').children('span').addClass('fa-play');
                    
                    $('.carousel-inner').children('button').removeClass('btn-danger');
                    $('.carousel-inner').children('button').addClass('btn-success');

                    $('.carousel-inner').children('button').tooltip('hide').attr('data-original-title', 'Play').tooltip('fixTitle').tooltip('show');
                   




                }
                else if($('#carouselButton').children('span').hasClass('fa-play')){
                    $('#mycarousel').carousel('cycle');
                    $('#carouselButton').children('span').removeClass('fa-play');
                    $('#carouselButton').children('span').addClass('fa-pause');
                    $('.carousel-inner').children('button').removeClass('btn-success');
                    $('.carousel-inner').children('button').addClass('btn-danger');

                    $('.carousel-inner').children('button').tooltip('hide').attr('data-original-title', 'Pause').tooltip('fixTitle').tooltip('show');


                }
            });
            $('#reserveModalOpen').click(function(){
                $('#reserveModal').modal('show');
            });
        
            $('#reserveModalClose').click(function(){
                $('#reserveModal').modal('hide');
            });
            $('#choiceModalOpen').click(function(){
                $('#choiceModal').modal('show');
            });
        
            $('#loginModalOpen').click(function(){
                $('#loginModal').modal('show');
            });
        
            $('#loginModalClose').click(function(){
                $('#loginModal').modal('hide');
            });
            $('#choiceModalClose').click(function(){
                $('#choiceModal').modal('hide');
            });
        
        });
 