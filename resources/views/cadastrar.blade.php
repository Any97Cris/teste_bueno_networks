@extends('layouts.head')
<div class="container">
<h2 class="mb-5">Cadastrar</h2>
    <div class="row justify-content-md-center cotainer">
        <div class="col-4">
            <form>
                <!-- Name input -->
                <div class="form-outline mb-4">
                    <input type="text" id="nome" name="name" class="form-control" />
                    <label class="form-label" for="form2Example1">Nome e Sobrenome</label>
                </div>

                <!-- Email input -->
                <div class="form-outline mb-4">
                    <input type="email" id="email" name="email" class="form-control" />
                    <label class="form-label" for="form2Example1">Email</label>
                </div>

                <!-- Password input -->
                <div class="form-outline mb-4">
                    <input type="password" id="password" name="password" class="form-control" />
                    <label class="form-label" for="password">Password</label>
                </div>
                

                <!-- Submit button -->
                <div class="d-grid gap-2">
                    <button type="button" class="btn btn-primary btn-block mb-4">Cadastrar</button>
                </div>
            </form>
        </div>
    </div>
</div>
@extends('layouts.footer')
