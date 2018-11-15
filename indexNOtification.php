
3
4
5
6
7
8
9
10
11
12
13
14
15
16
17
18
19
20
21
22
23
24
25
26
27
28
29
30
31
32
33
34
35
36
37
38
39
40
41
42
43
44
45
46
47
48
49
50
51
52
53
54
55
56
57
58
59
60
61
62
63
64
65
66
67
68
69
70
71
72
73
74
75
76
77
78
79
80
81
82
<!DOCTYPE html>
 
<html>
 
<head>
 
 <title>Notification using PHP Ajax Bootstrap</title>
 
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
 
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
 
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 
</head>
 
<body>
 
 <br /><br />
 
 <div class="container">
 
  <nav class="navbar navbar-inverse">
 
   <div class="container-fluid">
 
    <div class="navbar-header">
 
     <a class="navbar-brand" href="#">PHP Notification Tutorial</a>
 
    </div>
 
    <ul class="nav navbar-nav navbar-right">
 
     <li class="dropdown">
 
      <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="label label-pill label-danger count" style="border-radius:10px;"></span> <span class="glyphicon glyphicon-bell" style="font-size:18px;"></span></a>
 
      <ul class="dropdown-menu"></ul>
 
     </li>
 
    </ul>
 
   </div>
 
  </nav>
 
  <br />
 
  <form method="post" id="comment_form">
 
   <div class="form-group">
 
    <label>Enter Subject</label>
 
    <input type="text" name="subject" id="subject" class="form-control">
 
   </div>
 
   <div class="form-group">
 
    <label>Enter Comment</label>
 
    <textarea name="comment" id="comment" class="form-control" rows="5"></textarea>
 
   </div>
 
   <div class="form-group">
 
    <input type="submit" name="post" id="post" class="btn btn-info" value="Post" />
 
   </div>
 
  </form>
 
 
 </div>
 
</body>
 
</html>