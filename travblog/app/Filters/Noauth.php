<?php
namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class Noauth implements FilterInterface
{
    public function before(RequestInterface $request,$arguments=null)
    {
        if(session()->get('isloggedin'))
        {
            return redirect()->to('blogs');
        }
    }
    public function after(RequestInterface $request,ResponseInterface $respones,$arguments=null)
    {
        //some code
    }
}
?>