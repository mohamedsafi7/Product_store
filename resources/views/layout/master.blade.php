<div style="display: flex;background-color:grey;align-items: center;justify-content: space-between;padding-inline: 30px;padding:20px">
    <h2>Online Store</h2>
    <nav>
        <a href="#">Home</a>
        <a href="#">Products</a>
        <a href="#">Cart</a>
        <a href="#">About</a>
        <a href="#" style="border-left: 4px solid #fff;padding:10px">Login</a>
        <a href="#">Register</a>
    </nav>
</div>

<style>
    .main {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: calc(100vh - 120px); /* Subtracting the height of the header */
        }
    nav a {
        margin: 15px;
        text-decoration: none;
        color: #fff;
        font-weight: bold;
    }
</style>

<div class="main"> 
        @yield('content')
  
</div>
