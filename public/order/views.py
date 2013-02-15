from django.shortcuts import render_to_response


def index(request):
    return render_to_response('order/order_form.html',
                             {'months': range(1, 13),
                             'credit_years': range(2013, 2025)})
