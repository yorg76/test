using System;
using System.Linq;
using System.Collections.Generic;
using System.Text;

namespace ArchiDox
{
    class JsonResponseOrderDetailsResult
    {
            public string status { get; set; }
            public List<Box> content { get; set; }
            public bool scan { get; set; }
            public string error { get; set; }
    }
}
