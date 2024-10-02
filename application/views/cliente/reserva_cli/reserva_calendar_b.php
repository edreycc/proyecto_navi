<div class="container-fluid">

    <!-- Encabezado de la Página -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="" class="btn btn-primary btn-sm" style="margin-bottom: 10px;">
                <i class="fa-solid fa-left-long"></i> 
                Atras              
            </a> 
            <h6 class="m-0 font-weight-bold text-primary">Reservar</h6>
        </div>
        <div class="card-body">
            
        <?php
        echo form_open_multipart('');
        ?>
            <div class="row">
                <div class="col-md-6">
                    
                    
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                
                                    <h6 class="m-0 font-weight-bold text-primary">Barberos</h6>
                                </div>
                                
                                <div class="card-body">

                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        José
                                        <button class="btn btn-primary btn-sm">Reservar</button>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        María
                                        <button class="btn btn-primary btn-sm">Reservar</button>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        Juan
                                        <button class="btn btn-primary btn-sm">Reservar</button>
                                    </li>
                                </div>
                                
                            </div>
                        
                    
                </div>
                <div class="col-md-6">



                    <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                    
                                        <h6 class="m-0 font-weight-bold text-primary">Horarios</h6>
                                    </div>
                                    
                                    <div class="card-body">

                                        <div class="content">        
                                                <div class="container text-left">
                                                
                                                    <div class="row justify-content-center">
                                                        <!-- <div class="col-md-10 text-center"> -->
                                                            <!-- <input type="text" class="form-control w-25 mx-auto mb-3" id="result" placeholder="Select date" disabled=""> -->
                                                            <form action="#" class="row">
                                                                <div class="col-md-12">
                                                                <div id="inline_cal"></div>
                                                                </div>
                                                            </form>
                                                        <!-- </div> -->
                                                    </div>
                                                    
                                                </div>
                                        </div>

                                            <table class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>Hora</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>09:00 AM - 10:00 AM</td>
                                                    </tr>
                                                    <tr>
                                                        <td>10:00 AM - 11:00 AM</td>
                                                    </tr>
                                                    <tr>
                                                        <td>11:00 AM - 12:00 PM</td>
                                                    </tr>
                                                    <tr>
                                                        <td>12:00 PM - 01:00 PM</td>
                                                    </tr>
                                                    <tr>
                                                        <td>01:00 PM - 02:00 PM</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                    </div>
                                    
                                </div>

                    </div>
                
            </div>


           

           

            <button type="submit" name="add_product" class="btn btn-primary">Guardar</button>

        <?php
        form_close();
        ?> 
        </div>
    </div>
</div>
