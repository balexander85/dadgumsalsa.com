# Create your views here.
from portfolio.models import daily_balances
from django.shortcuts import render_to_response


chea = 'oof!'


def index(request):
    return render_to_response('portfolio/index.html', {
        'entries': chea  # daily_balances.objects.all()
    })
