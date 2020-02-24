@extends('admin.dashboard-layout')

@section('title')
    Users
@endsection

@section('content')
    <div class="col-lg-10 dashSpaceContain">
        <div class="dashContain">
            <h1>User Details</h1>
            <div class="row">
                <div class="col-md-1">
                    <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#creatProfileModal">Profile</a>
                </div>
                <div class="col-md-1">
                    <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#createEducationModal">Education</a>
                </div>
                <div class="col-md-1">
                    <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#createDetailModal">Details</a>
                </div>
                <div class="col-md-1">
                    <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#createDocumentModal">Documents</a>
                </div>
                <div class="col-md-1">
                    <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#createExperienceModal">Experiences</a>
                </div>
                <div class="col-md-1">
                    <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#createPortfolioModal">Portfolios</a>
                </div>
                <div class="col-md-1">
                    <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#createSkillModal">Skills</a>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <div class="userDetailBack">
                        <div class="userDetDashImg">
                            <img src="{{ $user->present()->profilePicture }}">
                        </div>
                        <p><strong>Name : </strong>{{$user->name}} </p>
                        <p><strong>Phone : </strong>{{$user->phone}}</p>
                        <p><strong>Email : </strong>{{$user->email}}</p>
                        <p><strong>User Type : </strong>{{$user->type}}</p>
                        <p><strong>Status : </strong>{{$user->status}}</p>
                        <p><strong>Joined Date : </strong>{{$user->created_at? :'starting'}}</p>
                    </div>
                </div>
                @if ($user->detail)
                    <div class="col-lg-4">
                        <div class="userDetailBack">
                            <p><strong>Father Name : </strong>{{$user->detail->father_name? :'--'}} </p>
                            <p><strong>Mother Name : </strong>{{$user->detail->mother_name? :'--'}}</p>
                            <p><strong>Grand Father Name : </strong>{{$user->detail->grandfather_name? :'--'}}</p>
                            <p><strong>Spouse Name : </strong>{{$user->detail->spouse_name? :'--'}}</p>
                            <p><strong>Permanent Address : </strong>{{$user->detail->permanent_address? :'--'}}</p>
                            <p><strong>Temporary Address : </strong>{{$user->detail->temporary_address? :'--'}}</p>
                            <p><strong>DOB : </strong>{{$user->detail->dob? :'--'}}</p>
                            <p><strong>Citizenship No : </strong>{{$user->detail->citizenship_no? :'--'}}</p>
                            <p><strong>Citizenship Issue Date : </strong>{{$user->detail->citizenship_issue_date? :'--'}}</p>
                            <p><strong>Citizenship Issue District : </strong>{{$user->detail->citizenship_issue_district? :'--'}}</p>
                            <p><strong>PAN No : </strong>{{$user->detail->pan_no? :'--'}}</p>
                        </div>
                    </div>
                @endif
                @if ($user->profile)
                    <div class="col-lg-4">
                        <div class="userDetailBack">
                            <p><strong>Profession : </strong>{{$user->profile->profession? :'--'}} </p>
                            <p><strong>Current Company : </strong>{{$user->profile->current_company? :'--'}} </p>
                            <p><strong>Expected Salary : </strong>{{$user->profile->expected_salary? :'--'}} </p>
                            <p><strong>Description : </strong>{{$user->profile->description? :'--'}} </p>
                        </div>
                    </div>
                @endif
            </div>
            <div class="row">
                @if (count($user->educations)>0)
                    <div class="col-lg-4">
                        <div class="userDetailBack">
                            @foreach ($user->educations as $education)
                                <p><strong>Education : </strong>{{$education->education? :'--'}} </p>
                                <p><strong>From : </strong>{{$education->from? :'--'}} </p>
                                <p><strong>To : </strong>{{$education->to? :'running'}} </p>
                            @endforeach
                        </div>
                    </div>
                @endif
                @if (count($user->experiences)>0)
                    <div class="col-lg-4">
                        <div class="userDetailBack">
                            @foreach ($user->experiences as $experience)
                                <p><strong>Company Name : </strong>{{$experience->company_name? :'--'}} </p>
                                <p><strong>Designation : </strong>{{$experience->designation? :'--'}} </p>
                                <p><strong>From : </strong>{{$experience->from? :'--'}} </p>
                                <p><strong>To : </strong>{{$experience->to? :'running'}} </p>
                            @endforeach
                        </div>
                    </div>
                @endif
                @if ($user->document)
                    <div class="col-lg-4">
                        <div class="userDetailBack">
                            <div class="userDetDashImg">
                                <img src="{{ asset($user->document->pp_photo) }}">
                            </div>
                            <div class="userDetDashImg">
                                <img src="{{ asset($user->document->citizenship_front) }}">
                            </div>
                            <div class="userDetDashImg">
                                <img src="{{ asset($user->document->citizenship_back) }}">
                            </div>
                        </div>
                    </div>
                @endif
            </div>
            <div class="row">
                @if (count($user->portfolios)>0)
                    <div class="col-lg-4">
                        <div class="userDetailBack">
                            @foreach ($user->portfolios as $portfolio)
                                <p><strong>Project Name : </strong>{{$portfolio->project_name? :'--'}} </p>
                                <p><strong>Project Type : </strong>{{$portfolio->project_type? :'--'}} </p>
                                <p><strong>Project Url : </strong>{{$portfolio->project_url? :'--'}} </p>
                            @endforeach
                        </div>
                    </div>
                @endif
                @if (count($user->skills)>0)
                    <div class="col-lg-4">
                        <div class="userDetailBack">
                            @foreach ($user->skills as $skill)
                                <p><strong>Skill Name : </strong>{{$skill->skill}} </p>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
    <div class="modal fade" id="createDetailModal" tabindex="-1" role="dialog" aria-labelledby="createDetailModalLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <form action="{{ route('details.store') }}" method="POST" enctype="multipart/form-data" id="createDetailForm" autocomplete="off">
                    @csrf
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title" id="createDetailModalLabel">Add new Detail</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="father_name">Father Name</label>
                                    <input type="text" name="father_name" id="father_name" class="form-control">
                                    <span class="clearfix"></span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="mother_name">Mother Name</label>
                                    <input type="text" name="mother_name" id="mother_name" class="form-control">
                                    <span class="clearfix"></span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="grandfather_name">Grand Father Name</label>
                                    <input type="text" name="grandfather_name" id="grandfather_name" class="form-control">
                                    <span class="clearfix"></span>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="spouse_name">Spouse Name</label>
                                    <input type="text" name="spouse_name" id="spouse_name" class="form-control">
                                    <span class="clearfix"></span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="permanent_address">Permanent Address</label>
                                    <input type="text" name="permanent_address" id="permanent_address" class="form-control">
                                    <span class="clearfix"></span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="temporary_address">Temporary Address</label>
                                    <input type="text" name="temporary_address" id="temporary_address" class="form-control">
                                    <span class="clearfix"></span>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="citizenship_no">Citizenship Number</label>
                                    <input type="number" name="citizenship_no" id="citizenship_no" class="form-control">
                                    <span class="clearfix"></span>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="citizenship_issued_district">Citizenship Isseued District</label>
                                    <input type="text" name="citizenship_issued_district" id="citizenship_issue_district" class="form-control">
                                    <span class="clearfix"></span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="citizenship_issued_date">Citizenship Isseued Date</label>
                                    <input type="date" name="citizenship_issued_date" id="citizenship_issue_date" class="form-control">
                                    <span class="clearfix"></span>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="dob">Date of Birth</label>
                                    <input type="date" name="dob" id="dob" class="form-control" placeholder="2076/11/01">
                                    <span class="clearfix"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="pan_no">Pan No</label>
                                    <input type="number" name="pan_no" id="pan_no" class="form-control">
                                    <span class="clearfix"></span>
                                </div>
                            </div>
                            <input type="hidden" name="user_id" value="{{$user->id}}">
                        </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                      <button type="submit" class="btn btn-primary">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="creatProfileModal" tabindex="-1" role="dialog" aria-labelledby="creatProfileModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="{{ route('profiles.store') }}" method="POST" enctype="multipart/form-data" id="createProfileForm" autocomplete="off">
                    @csrf
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title" id="creatProfileModalLabel">Add new Profile</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="profession">Profession</label>
                                    <input type="text" name="profession" id="profession" class="form-control">
                                    <span class="clearfix"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="current_company">Current Working Company</label>
                                    <input type="text" name="current_company" id="current_company" class="form-control">
                                    <span class="clearfix"></span>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="expected_salary">Expected Salary</label>
                                    <input type="text" name="expected_salary" id="expected_salary" class="form-control">
                                    <span class="clearfix"></span>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea type="text" name="description" id="description" class="form-control"></textarea>
                                    <span class="clearfix"></span>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <input type="hidden" name="user_id" value="{{$user->id}}">
                        </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                      <button type="submit" class="btn btn-primary">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="createEducationModal" tabindex="-1" role="dialog" aria-labelledby="createEducationModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="{{ route('educations.store') }}" method="POST" enctype="multipart/form-data" id="createEducationForm" autocomplete="off">
                    @csrf
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title" id="createEducationModalLabel">Add new Education</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="education">Education</label>
                                    <input type="text" name="education" id="education" class="form-control">
                                    <span class="clearfix"></span>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="from">From</label>
                                    <input type="date" name="from" id="from" class="form-control">
                                    <span class="clearfix"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="to">To</label>
                                    <input type="date" name="to" id="to" class="form-control">
                                    <span class="clearfix"></span>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <input type="hidden" name="user_id" value="{{$user->id}}">
                        </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                      <button type="submit" class="btn btn-primary">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="createExperienceModal" tabindex="-1" role="dialog" aria-labelledby="createExperienceModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="{{ route('experiences.store') }}" method="POST" enctype="multipart/form-data" id="createExperienceForm" autocomplete="off">
                    @csrf
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title" id="createExperienceModalLabel">Add new Experience</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="company_name">Company Name</label>
                                    <input type="text" name="company_name" id="company_name" class="form-control">
                                    <span class="clearfix"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="designation">Designation</label>
                                    <input type="text" name="designation" id="designation" class="form-control">
                                    <span class="clearfix"></span>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="from">From</label>
                                    <input type="date" name="from" id="from" class="form-control">
                                    <span class="clearfix"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="to">To</label>
                                    <input type="date" name="to" id="to" class="form-control">
                                    <span class="clearfix"></span>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <input type="hidden" name="user_id" value="{{$user->id}}">
                        </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                      <button type="submit" class="btn btn-primary">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="createDocumentModal" tabindex="-1" role="dialog" aria-labelledby="createDocumentModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="{{ route('documents.store') }}" method="POST" enctype="multipart/form-data" id="createDocumentForm" autocomplete="off">
                    @csrf
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title" id="createDocumentModalLabel">Add new Document</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="pp_photo">Passport-size Photo</label>
                                    <input type="file" name="pp_photo" id="pp_photo" class="form-control" accept='image/*'>
                                    <span class="clearfix"></span>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="citizenship_front">Citizenship Front</label>
                                    <input type="file" name="citizenship_front" id="citizenship_front" class="form-control" accept='image/*'>
                                    <span class="clearfix"></span>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="citizenship_back">Citizenship Back</label>
                                    <input type="file" name="citizenship_back" id="citizenship_back" class="form-control" accept='image/*'>
                                    <span class="clearfix"></span>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="resume">Resume/CV</label>
                                    <input type="file" name="resume" id="resume" class="form-control" accept='application/msword, application/pdf'>
                                    <span class="clearfix"></span>
                                </div>
                            </div>
                            <input type="hidden" name="user_id" value="{{$user->id}}">
                        </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                      <button type="submit" class="btn btn-primary">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="createPortfolioModal" tabindex="-1" role="dialog" aria-labelledby="createPortfolioModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="{{ route('portfolios.store') }}" method="POST" enctype="multipart/form-data" id="createPortfolioForm" autocomplete="off">
                    @csrf
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title" id="createPortfolioModalLabel">Add new Portfolio</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="project_name">Project Name</label>
                                    <input type="text" name="project_name" id="project_name" class="form-control">
                                    <span class="clearfix"></span>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="project_type">Project Type</label>
                                    <input type="text" name="project_type" id="project_type" class="form-control">
                                    <span class="clearfix"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="project_url">Project URL</label>
                                    <input type="text" name="project_url" id="project_url" class="form-control">
                                    <span class="clearfix"></span>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <input type="hidden" name="user_id" value="{{$user->id}}">
                        </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                      <button type="submit" class="btn btn-primary">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="createSkillModal" tabindex="-1" role="dialog" aria-labelledby="createSkillModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="{{ route('skills.store') }}" method="POST" enctype="multipart/form-data" id="createSkillForm" autocomplete="off">
                    @csrf
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title" id="createSkillModalLabel">Add new Skill</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="skill">Skill</label>
                                    <input type="text" name="skill" id="skill" class="form-control">
                                    <span class="clearfix"></span>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <input type="hidden" name="user_id" value="{{$user->id}}">
                        </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                      <button type="submit" class="btn btn-primary">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection