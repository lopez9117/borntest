this is a backend test for the german company borntocreate



can signin user
http://localhost/borntest/public/auth/signin
		parameters:
			email:
			password:

	




can signup a new user
    http://localhost/borntest/public/auth/signup
	    parameters:
		    name:
		    email:
		    password:



can logout the user
	http://localhost/borntest/public/auth/signout
	


can change the password for that user
	http://localhost/borntest/public/auth/password/change
		parameters:
			password:
		


can get the list of post
	http://localhost/borntest/public/post/list
		


can create a new post
	http://localhost/borntest/public/post/store
				title:
				author_id:
				content:


can  get the list of authors
	http://localhost/borntest/public/author/list


can create a new authors
	http://localhost/borntest/public/author/store
			firstname
			lastname

