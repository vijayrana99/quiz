<h2>Hello,</h2>
<p>Someone has invited you to take a quiz. Please click on the link below</p>

<a href="{{ route('quiz.accept', [$quiz->slug, $token] ) }}"> Take Quiz </a>