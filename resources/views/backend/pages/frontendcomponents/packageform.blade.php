@extends('backend.master')
@section('content')


<style>
    .center {
    text-align: center;
    }
</style>



<div class="col-12 col-md-12 col-lg-12">


    <div class="card">
        <div class="card-header">
            <h4 class="text-center">+Add Package</h4>
          </div>
    <div>
        <h6 style="text-align: right;"><i class="fas fa-chevron-right">Our Service </i> <i class="fas fa-chevron-right"> Add Package </i> </h6>
    </div>


    <form  method="POST" enctype="multipart/form-data" id="packageadd">


      <div class="card-body">
        <div class="form-row">
            <div class="form-group col-md-12">
                <label for="inputName1">Title</label>
                <input type="text" name="title" class="form-control" id="title" placeholder="title">

                @error('title')

                <small class="text-danger">{{$message}}</small>

                @enderror
              </div>

              <div class="form-group col-md-12" style="margin-bottom: 20px;">
                <label for="inputName1" style="font-size: 18px; font-weight: bold;">About*</label>
                <input type="text" name="about" class="form-control" id="about" style="height: 60px; font-size: 16px;" placeholder="Write Your about Here.." /> <!-- Increase height and font size -->

                @error('about')
                <small class="text-danger">{{$message}}</small>
                @enderror
            </div>

        </div>

        <div class="center">
            <button type="submit" class="btn btn-success ">Submit</button>
        </div>
      </div>

        </form>

      </div>
    </div>
  </div>

  <script>
    let contactForm = document.getElementById('packageadd')
    contactForm.addEventListener('submit',async(event)=>{
        event.preventDefault();

        let title=document.getElementById('title').value;
        let about = document.getElementById('about').value;

        if(title.length === 0){
            alert('Title feild is required');
        }else if(about.length === 0){
        alert('About feild is required')
        }else{

            let formData ={
                title:title,
                about:about,

            }
            let URL = "/package-add";
            let result = await axios.post(URL,formData);
            contactForm.reset()
            successToast('Package added, Success');
        }
    })
      </script>

@endsection
