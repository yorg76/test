using System;
using System.Linq;
using System.Collections.Generic;
using System.Text;

namespace ArchiDox
{
    class JsonResponseOrdersResult
    {
            public string status { get; set; }
            public List<Order> content { get; set; }
            public string error { get; set; }
    }
}
