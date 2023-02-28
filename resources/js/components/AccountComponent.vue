<template>

    <div class="container">
        <h2 class="mt-3 sub-heading-blue">My Account - Samalie Piwan</h2>
        <div class="row">
            <div class="col-md-4">
                <div class="list-group" id="list-tab" role="tablist">
                <a class="list-group-item list-group-item-action active" id="list-grades-list" data-toggle="list" href="#list-grades" role="tab" aria-controls="grades">My Grades</a>
                <a class="list-group-item list-group-item-action" id="list-courses-list" data-toggle="list" href="#list-courses" role="tab" aria-controls="courses">Saved Courses</a>
                <a class="list-group-item list-group-item-action" id="list-settings-list" data-toggle="list" href="#list-settings" role="tab" aria-controls="settings">Account Settings</a>
                </div>
            </div>
            <div class="col-md-8">
                <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="list-grades" role="tabpanel" aria-labelledby="list-grades-list">
                    <div class="card shadow">
                        <div class="card-body">
                            <h3 class="sub-heading-grey">My Grades - BCM/IT</h3>
                            <div>
                                <form>
                                    <div class="form-group row mt-2">
                                        <label for="principalOne" class="col-sm-4 col-form-label">Mathematics : </label>
                                        <input type="text" class="col-sm-6 form-control-sm" id="principalOne" value="A" readonly>
                                    </div>
                                    <div class="form-group row mt-2">
                                        <label for="principalTwo" class="col-sm-4 col-form-label">Economics : </label>
                                        <input type="text" class="col-sm-6 form-control-sm" id="principalTwo" value="A" readonly>
                                    </div>
                                    <div class="form-group row mt-2">
                                        <label for="principalThree" class="col-sm-4 col-form-label">Geography : </label>
                                        <input type="text" class="col-sm-6 form-control-sm" id="principalThree" value="C" readonly>
                                    </div>
                                    <div class="form-group row mt-2">
                                        <label for="subsidiary" class="col-sm-4 col-form-label">Mathematics : </label>
                                        <input type="text" class="col-sm-6 form-control-sm" id="subsidiary" value="1" readonly>
                                    </div>
                                    <div class="form-group row mt-2">
                                        <label for="generalPaper" class="col-sm-4 col-form-label">Mathematics : </label>
                                        <input type="text" class="col-sm-6 form-control-sm" id="generalPaper" value="1" readonly>
                                    </div>
                                </form>
                            </div><br><br>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="list-courses" role="tabpanel" aria-labelledby="list-courses-list">
                    <div class="card shadow">
                        <div class="card-body">
                            <h3 class="sub-heading-grey">Saved Courses</h3>
                            <div>
                                <div class="list-group">
                                    <div class="list-group-item list-group-item-action flex-column align-items-start">
                                        <div class="d-flex w-100 justify-content-between">
                                            <h5 class="mb-1">Bachelor of Computer Science</h5>
                                            <span><font-awesome-icon icon="fa-regular fa-bookmark"></font-awesome-icon></span>
                                        </div>
                                        <small>Mbarara University of Science and Technology</small><br>
                                        <span class="badge badge-warning mt-2">3 years</span>
                                        <span class="badge badge-primary mt-2">Day</span>
                                        <span class="badge badge-info mt-2">Government Sponsored</span>
                                    </div>
                                    <div class="list-group-item list-group-item-action flex-column align-items-start">
                                        <div class="d-flex w-100 justify-content-between">
                                            <h5 class="mb-1">Bachelor of Information Sciences</h5>
                                            <span><font-awesome-icon icon="fa-regular fa-bookmark"></font-awesome-icon></span>
                                        </div>
                                        <small>Makerere University</small><br>
                                        <span class="badge badge-warning mt-2">3 years</span>
                                        <span class="badge badge-primary mt-2">Day</span>
                                        <span class="badge badge-info mt-2">Government Sponsored</span>
                                    </div>
                                </div>
                            </div>
                            <br><br>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="list-settings" role="tabpanel" aria-labelledby="list-settings-list">4</div>
                </div>
            </div>
            </div>
    </div>

</template>