@extends('Home.master')

@section('body')
    <?php
    $loc_array = [];
    $role_array = [];
    $srole_array = [];
    $time_array = [];
    $cate_array = [];
    $fulltime_arr = [];
    $parttime_arr = [];
    $all_cat = [];
    $sal_range_10_20 = [];
    $sal_range_20_30 = [];
    $sal_range_30_40 = [];
    ?>
    <div class="page-content-area">
        <!-- Dashboard Section -->
        <section class="section-padding dashboard-section">
            <div class="container">
                <form  action="{{url('/jobs-frontend-search')}}" method="get" >
                <div class="row">
                    <div class="col-md-12">
                        <div class="job-search-box">
                            <h4>Find your next job</h4>
                            <div class="row">
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <div class="faq-input-box mr-0 mb-0">
                                            <i class="feather icon-search faq-icon"></i>
                                            <input type="text"  name="search_job"class="faq-input" placeholder="Job Title" autocomplete="off"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <div class="faq-input-box mr-0 mb-0">
                                            <i class="feather icon-map-pin faq-icon"></i>
                                            <input type="text" name="search_location" class="faq-input" placeholder="Location" autocomplete="off"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group select2Part select2arrow jobsearch-select w-100">
                                        <div class="faq-input-box mr-0 mb-0">
                                            <i class="feather icon-search faq-icon"></i>
                                            <select name="search_role" id="" class="selectcustom">
                                                <option value="">Job Category</option>
                                                @foreach($all_locations as $val)
                                                    <?php
                                                    $cur_cate = $val->job_role;
                                                    if (!in_array($cur_cate, $cate_array)) {
                                                        array_push($cate_array, $cur_cate); ?>
																<option value="{{$val->job_role}}">{{$val->job_role}}</option>
															<?php
                                                    }
                                                    ?>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <button type="submit" class="faq-submit btn-block" value="search">Search</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </form>
                <div class="row">
                    <div class="col-lg-4 mb-box">
                        <div class="dash-data-card h-100 mb-0">
                            <div class="filter-sidebar">
                                <div class="filter-box">
                                    <h5 class="filter-title">Location</h5>
                                    <div class="form-group select2Part select2arrow w-100 mb-0">
                                        <select name="job_location" id="" class="selectcustom">
                                            <option value="">All Job Location</option>
                                            @foreach($all_locations as $val)
                                                <?php
                                                if ($val->job_type == 'Permanent') {
                                                    array_push($fulltime_arr, $val->job_type);
                                                }
                                                if ($val->job_type == 'Contractual') {
                                                    array_push($parttime_arr, $val->job_type);
                                                }

                                                $cur_role = $val->job_role;
                                                array_push($all_cat, $cur_role);

                                                if (($val->min_salary >= 10000 && $val->min_salary < 20000) || ($val->max_salary >= 10000 && $val->max_salary < 20000)) {
                                                    array_push($sal_range_10_20, $val->min_salary);
                                                }

                                                if (($val->min_salary >= 20000 && $val->min_salary < 30000) || ($val->max_salary >= 20000 && $val->max_salary < 30000)) {
                                                    array_push($sal_range_20_30, $val->min_salary);
                                                }

                                                if (($val->min_salary >= 30000 && $val->min_salary < 40000) || ($val->max_salary >= 30000 && $val->max_salary < 40000)) {
                                                    array_push($sal_range_30_40, $val->min_salary);
                                                }
                                                $cur_loc = "$val->city,$val->state";
                                                if (!in_array($cur_loc, $loc_array)) {
                                                    array_push($loc_array, $cur_loc); ?>
                                                    <option value="{{$val->city}},{{$val->state}}" <?= isset($parse_in_url['job_location']) && in_array($val->city . ',' . $val->state, $parse_in_url['job_location'])
                                                        ? 'selected'
                                                        : '' ?> >{{$val->city}},{{$val->state}}</option>
                                                <?php
                                                }
                                                ?>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <?php $cat_arr = array_count_values($all_cat); ?>
                                <div class="filter-box">
                                    <h5 class="filter-title">Job Type</h5>
                                    <div class="form-group mb-0 ">
                                        <div class="custom-control custom-checkbox mb-checkbox">
                                            <input type="checkbox" class="custom-control-input" name="job_type" id="jobtype10" value="Permanent" <?= isset($parse_in_url['job_type']) && in_array('Permanent', $parse_in_url['job_type'])
                                                ? 'checked'
                                                : '' ?>>
                                            <label class="custom-control-label" for="jobtype10">Full Time (<?= count($fulltime_arr) ?>)</label>
                                        </div>
                                        <div class="custom-control custom-checkbox mb-checkbox">
                                            <input type="checkbox" class="custom-control-input" name="job_type" id="jobtype11" value="Contractual" <?= isset($parse_in_url['job_type']) && in_array('Contractual', $parse_in_url['job_type'])
                                                ? 'checked'
                                                : '' ?> >
                                            <label class="custom-control-label" for="jobtype11">Part Time (<?= count($parttime_arr) ?>)</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="filter-box job-category-filter">
                                    <h5 class="filter-title">Job Category</h5>
                                    <div class="form-group mb-0 job-type-view" style="">
                                        @foreach($all_locations as $val)
                                            <?php
                                            $cur_role = $val->job_role;
                                            if (!in_array($cur_role, $role_array)) {
                                                array_push($role_array, $cur_role); ?>
                                        <div class="custom-control custom-checkbox mb-checkbox">
                                            <input type="checkbox" name="category_input" class="custom-control-input" id="jobcat1{{$val->id}}" value="{{$val->job_role}}" <?= isset($parse_in_url['category_input']) &&
                                            in_array($val->job_role, $parse_in_url['category_input'])
                                                ? 'checked'
                                                : '' ?> >
                                            <label class="custom-control-label" for="jobcat1{{$val->id}}">{{$val->job_role}} (<?= $cat_arr[$val->job_role] ?>)</label>
                                        </div>
                                            <?php
                                            }
                                            ?>
                                        @endforeach
                                    </div>
                                    <div class="see-all-job">See All</div>
                                </div>
                                <div class="filter-box">
                                    <h5 class="filter-title">Salary</h5>
                                    <div class="form-group mb-0">
                                        <div class="custom-control custom-checkbox mb-checkbox">
                                            <input type="checkbox" name="salary_input" class="custom-control-input" id="jobsalary1"  value="20000" <?= isset($parse_in_url['salary_input']) && in_array('20000', $parse_in_url['salary_input'])
                                                ? 'checked'
                                                : '' ?> >
                                            <label class="custom-control-label" for="jobsalary1">10000 - 20000 (<?= count($sal_range_10_20) ?>)</label>
                                        </div>
                                        <div class="custom-control custom-checkbox mb-checkbox">
                                            <input type="checkbox" name="salary_input" class="custom-control-input" id="jobsalary2"   value="30000" <?= isset($parse_in_url['salary_input']) && in_array('30000', $parse_in_url['salary_input'])
                                                ? 'checked'
                                                : '' ?> >
                                            <label class="custom-control-label" for="jobsalary2">20000 - 30000 (<?= count($sal_range_20_30) ?>)</label>
                                        </div>
                                        <div class="custom-control custom-checkbox mb-checkbox">
                                            <input type="checkbox" name="salary_input" class="custom-control-input" id="jobsalary3"  value="40000" <?= isset($parse_in_url['salary_input']) && in_array('40000', $parse_in_url['salary_input'])
                                                ? 'checked'
                                                : '' ?>>
                                            <label class="custom-control-label" for="jobsalary3">30000 - 40000 (<?= count($sal_range_30_40) ?>)</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="filter-box">
                                    <h5 class="filter-title">Experience</h5>
                                    <div class="form-group mb-0">
                                        <div class="custom-control custom-checkbox mb-checkbox">
                                            <input type="checkbox" class="custom-control-input" name="job_experience" id="jobexperience1" value="12">
                                            <label class="custom-control-label" for="jobexperience1">0 - 1 Years</label>
                                        </div>
                                        <div class="custom-control custom-checkbox mb-checkbox">
                                            <input type="checkbox" class="custom-control-input" name="job_experience" id="jobexperience2" value="24">
                                            <label class="custom-control-label" for="jobexperience2">1 - 2 Years</label>
                                        </div>
                                        <div class="custom-control custom-checkbox mb-checkbox">
                                            <input type="checkbox" class="custom-control-input" name="job_experience" id="jobexperience3" value="36">
                                            <label class="custom-control-label" for="jobexperience3">2 - 3 Years</label>
                                        </div>
                                        <div class="custom-control custom-checkbox mb-checkbox">
                                            <input type="checkbox" class="custom-control-input" name="job_experience" id="jobexperience4" value="60">
                                            <label class="custom-control-label" for="jobexperience4">3 - 5 years</label>
                                        </div>
                                        <div class="custom-control custom-checkbox mb-checkbox">
                                            <input type="checkbox" class="custom-control-input" name="job_experience" id="jobexperience5" value="66">
                                            <label class="custom-control-label" for="jobexperience5">5 Years +</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 mb-box">
                        <div class="dash-data-card h-100 mb-0">
                            @if(isset($filter_job))
                                @if(empty($filter_job))
                                    <label><h4>No Jobs Found in this filter.</h4></label>
                                @endif
                                @foreach($filter_job as $val)
                                    <div class="job-box">
                                        <div class="job-like-toggle">
                                            <?php $checked = is_array($saved_by_current_user) && in_array($val->id, $saved_by_current_user) ? "checked" : ""; ?>

                                            <input type="checkbox" class="job-like-input" data-id="{{$val->id}}" id="joblike1{{$val->id}}" data-userid="{{ !empty($user_id) ? $user_id : '' }}" <?= $checked ?>/>
                                            <label for="joblike1{{$val->id}}" class="job-like-label">
                                                <i class="far fa-heart"></i>
                                            </label>
                                        </div>
                                        <a href="{{url('/jobs-frontend-detail')}}/{{$val->job_slug}}">
                                            <div class="job-left-box">
                                                <div class="job-image-box">
                                                    <img src="{{asset('assets')}}/images/dashboard/skill/google.svg" alt="">
                                                </div>
                                                <div class="job-main-data">
                                                    <h5>{{$val->job_title}}</h5>
                                                    <ul>
                                                        <li>{{$val->city}},{{$val->state}}</li>
                                                        <li>Salary:<span>{{$val->min_salary}}  - {{$val->max_salary}} </span></li>
                                                    </ul>
                                                    <h6>Posted :<span>{!! time_elapsed_string($val->creation_date) !!}</span></h6>
                                                </div>
                                            </div>
                                            <div class="job-right-box">
                                                <div class="job-tags">
                                                    <div class="job-tag {{ ($val->job_type == 'Permanent') ? 'blue-tag' : 'yellow-tag' }}">{{ ($val->job_type == 'Permanent') ? 'Full Time' : 'Part Time' }}</div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach
                            @else
                                @foreach($Job as $val)
                                    <div class="job-box">
                                        <div class="job-like-toggle">
                                            <?php $checked = is_array($saved_by_current_user) && in_array($val->id, $saved_by_current_user) ? "checked" : ""; ?>
                                            <input type="checkbox" class="job-like-input" data-id="{{$val->id}}" data-userid="{{ !empty($user_id) ? $user_id : '' }}" id="joblike1{{$val->id}}" <?= $checked ?> />
                                            <label for="joblike1{{$val->id}}" class="job-like-label">
                                                <i class="far fa-heart"></i>
                                            </label>
                                        </div>
                                        <a href="{{url('/jobs-frontend-detail')}}/{{$val->job_slug}}">
                                            <div class="job-left-box">
                                                <div class="job-image-box">
                                                    <img src="{{asset('assets')}}/images/dashboard/skill/google.svg" alt="">
                                                </div>
                                                <div class="job-main-data">
                                                    <h5>{{$val->job_title}}</h5>
                                                    <ul>
                                                        <li>{{$val->city}},{{$val->state}}</li>
                                                        <li>Salary:<span>{{$val->min_salary}}  - {{$val->max_salary}} </span></li>
                                                    </ul>
                                                    <h6>Posted :<span>{!! time_elapsed_string($val->creation_date) !!}</span></h6>

                                                </div>
                                            </div>
                                            <div class="job-right-box">
                                                <div class="job-tags">
                                                    <div class="job-tag {{ ($val->job_type == 'Permanent') ? 'blue-tag' : 'yellow-tag' }}">{{ ($val->job_type == 'Permanent') ? 'Full Time' : 'Part Time' }}</div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="dash-pagination pagination-center">
                            @if(isset($filter_job))
                                <nav aria-label="Page navigation example">
                                    <ul class="pagination">
                                        @if(($filter_job_count) > 1)

                                            @if(!isset($request_data['page']) || $request_data['page'] == $filter_job_count)
                                                <li class="page-item page-prvnxt-btn"><a class="page-link" href="javascript:void(0);"><i class="fa fa-chevron-left"></i></a></li>
                                            @else
                                                <li class="page-item page-prvnxt-btn"><a class="page-link" href="javascript:void(0);" data-id="{{$request_data['page']-1}}" data-href="/jobs/?page={{$request_data['page']-1}}"><i class="fa fa-chevron-left"></i></a></li>
                                            @endif

                                                @for($i=1; $i<=$filter_job_count; $i++)
                                                    <li class="page-item {{ ( ($i == 1 && !isset($request_data['page'])) || (isset($request_data['page']) && $request_data['page'] == $i )) ? "active" : ""; }}"><a class="page-link" href="javascript:void(0);" data-id="{{$i}}" data-href="/jobs/?action=filter_jobs&pass_filter={{$filter_url."&page=".$i}}">{{$i}}</a></li>
                                                @endfor

                                                @if($filter_job_count > 1 && isset($request_data['page']) && $filter_job_count!=$request_data['page'])

                                                    <li class="page-item page-prvnxt-btn"><a class="page-link" href="javascript:void(0);" data-id="{{$request_data['page']+1}}" data-href="/jobs/?page={{$request_data['page']+1}}"><i class="fa fa-chevron-right"></i></a></li>
                                                @else
                                                    <li class="page-item page-prvnxt-btn"><a class="page-link" href="javascript:void(0);"><i class="fa fa-chevron-right"></i></a></li>
                                                @endif

                                        @endif
                                    </ul>
                                </nav>
                            @else
                                {{$Job->links('Jobs/pagination')}}
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection