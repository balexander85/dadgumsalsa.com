from django.shortcuts import render_to_response


def index(request):
    return render_to_response('main/index.html')


def contact(request):
    return render_to_response('main/contact.html')


def about(request):
    return render_to_response('main/about.html')
