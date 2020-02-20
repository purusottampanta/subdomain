<script>
        toastr.options = {
          "closeButton": true,
         }
    </script>
    @if (session('status'))
      <script>
            toastr.success("{!! session('status') !!}");
      </script>
    @endif
    
    @if (session('error'))
      <script>
            toastr.error("{!! session('error') !!}");
      </script>
    @endif
    
    @if (session('warning'))
      <script>
            toastr.warning("{!! session('warning') !!}");
      </script>
    @endif
    
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <script>
                toastr.error("{!! $error !!}");
            </script>
        @endforeach
    @endif