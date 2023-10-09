<!DOCTYPE html>
<html>
<head>
  <title>OTP Verification Email</title>
  <style>
    .container {
      width: 600px;
      margin: 0 auto;
      padding: 20px;
      font-family: Arial, sans-serif;
      border: 1px solid #ccc;
      text-align: center;
    }
    h2 {
      color: #333;
    }
    p {
      margin-bottom: 20px;
    }
    .otp-code {
      font-size: 24px;
      font-weight: bold;
      color: #337ab7;
    }
    .note {
      color: #777;
    }
    .cta-button {
      display: inline-block;
      padding: 10px 20px;
      background-color: #337ab7;
      color: #fff;
      text-decoration: none;
      border-radius: 4px;
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>OTP Verification</h2>
    <p>Dear User</p>
    <p>Your One-Time Password (OTP) for verification is:</p>
    <p class="otp-code">{{$otp}}</p>
    <p class="note">Please enter this OTP in the verification form to complete the process.</p>
   
  </div>
</body>
</html>
