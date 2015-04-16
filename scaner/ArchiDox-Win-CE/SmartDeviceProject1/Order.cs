using System;
using System.Linq;
using System.Collections.Generic;
using System.Text;

namespace ArchiDox
{
    class Order
    {
        public string id{ get; set; }
        public string type { get; set; }
        public string warehouse_id { get; set; }
        public string quantity { get; set; }
        public string pickup_date { get; set; }
        public string create_date { get; set; }
        public string display_name { get; set; }
    }
}
