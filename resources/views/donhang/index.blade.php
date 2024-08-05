
  
  
  @extends('flayout.master')
  @section('noidung')

  <div class="container">
    <h1>Payment Information</h1>
    
    <form action="" method="POST">
        @csrf
        
        <div class="mb-3">
            <label for="cardNumber" class="form-label">Card Number</label>
            <input type="text" class="form-control" id="cardNumber" name="card_number" required>
        </div>
        
        <div class="mb-3">
            <label for="cardName" class="form-label">Cardholder Name</label>
            <input type="text" class="form-control" id="cardName" name="card_name" required>
        </div>
        
        <div class="mb-3">
            <label for="expiryDate" class="form-label">Expiry Date</label>
            <input type="text" class="form-control" id="expiryDate" name="expiry_date" required>
        </div>
        
        <div class="mb-3">
            <label for="cvv" class="form-label">CVV</label>
            <input type="text" class="form-control" id="cvv" name="cvv" required>
        </div>
        
        <button type="submit" class="btn btn-primary">Submit Payment</button>
    </form>
</div>
 
      @endsection
  
      
     
    
      
      
   