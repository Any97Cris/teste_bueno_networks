@extends('layouts.head')
<div class="container">
    <div class="row bg-secondary justify-content-md-center cotainer">
        <div class="col-4">
            <form>
                <!-- Email input -->
                <div class="form-outline mb-4">
                    <input type="email" id="form2Example1" class="form-control" />
                    <label class="form-label" for="form2Example1">Email address</label>
                </div>

                <!-- Password input -->
                <div class="form-outline mb-4">
                    <input type="password" id="form2Example2" class="form-control" />
                    <label class="form-label" for="form2Example2">Password</label>
                </div>

                <!-- Submit button -->
                <div class="d-grid gap-2">
                    <button type="button" class="btn btn-primary btn-block mb-4">Sign in</button>
                </div>
                <!-- Register buttons -->
                <div class="text-center">
                    <p>Not a member? <a href="#!">Register</a></p>
                </div>
            </form>
        </div>
    </div>
</div>
@extends('layouts.footer')
